<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use TightenCo\Jigsaw\Jigsaw;

class GenerateTagFeeds
{
    public function handle(Jigsaw $jigsaw)
    {
        $posts    = $jigsaw->getCollection('posts');
        $siteName = $jigsaw->getConfig('siteName');
        $baseUrl  = rtrim($jigsaw->getConfig('baseUrl'), '/');

        // Collect every unique category used across all posts
        $categories = $posts->flatMap(function ($post) {
            return $post->categories ?? [];
        })->unique()->sort()->values();

        // Ensure the /feeds/ output directory exists
        $feedsDir = $jigsaw->getDestinationPath() . '/feeds';
        if (!is_dir($feedsDir)) {
            mkdir($feedsDir, 0755, true);
        }

        foreach ($categories as $category) {
            $slug = Str::slug($category);

            // A post appears in a category feed for every category it is tagged with.
            // Tagging a post with multiple categories adds it to each of those feeds.
            $categoryPosts = $posts->filter(function ($post) use ($category) {
                return $post->categories && in_array($category, $post->categories, true);
            });

            $xml = $this->buildFeed($categoryPosts, $category, $slug, $siteName, $baseUrl);

            file_put_contents("{$feedsDir}/{$slug}.xml", $xml);
        }
    }

    private function buildFeed($posts, string $category, string $slug, string $siteName, string $baseUrl): string
    {
        $selfLink    = "{$baseUrl}/feeds/{$slug}.xml";
        $description = "Posts in the \"{$category}\" category from {$siteName}";

        $items = '';
        foreach ($posts->take(20) as $post) {
            $title       = htmlspecialchars($post->title ?? '', ENT_XML1);
            $link        = $post->getUrl();
            $pubDate     = date('r', $post->date);
            $description_text = htmlspecialchars(
                $post->description ?? strip_tags(substr($post->getContent(), 0, 255)),
                ENT_XML1
            );

            $categoryTags = '';
            if ($post->categories) {
                foreach ($post->categories as $cat) {
                    $categoryTags .= '            <category>' . htmlspecialchars($cat, ENT_XML1) . "</category>\n";
                }
            }

            $items .= <<<ITEM

        <item>
            <title>{$title}</title>
            <link>{$link}</link>
            <guid isPermaLink="true">{$link}</guid>
            <description><![CDATA[{$description_text}]]></description>
            <pubDate>{$pubDate}</pubDate>
{$categoryTags}        </item>
ITEM;
        }

        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{$siteName} – {$category}</title>
        <link>{$baseUrl}</link>
        <description>{$description}</description>
        <language>en-us</language>
        <atom:link href="{$selfLink}" rel="self" type="application/rss+xml" />
{$items}
    </channel>
</rss>
XML;
    }
}
