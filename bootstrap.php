<?php

// @var $container \Illuminate\Container\Container
// @var $events \TightenCo\Jigsaw\Events\EventBus

/*
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

use App\Listeners\GenerateTagFeeds;
use TightenCo\Jigsaw\Jigsaw;

$events->afterBuild(App\Listeners\GenerateSitemap::class);
$events->afterBuild(App\Listeners\GenerateIndex::class);

$events->afterCollections(function ($jigsaw) {
    $jigsaw->getCollection('posts')->map(function ($post) {
        $post->getExcerpt = function ($length = 255) use ($post) {
            if ($post->description) {
                return $post->description;
            }

            $content = strip_tags($post->getContent());

            if (strlen($content) <= $length) {
                return $content;
            }

            return substr($content, 0, $length) . '...';
        };

        $post->getReadTime = function () use ($post) {
            $wordCount = str_word_count(strip_tags($post->getContent()));
            return max(1, (int) ceil($wordCount / 200)); // 200 words per minute
        };

        return $post;
    });
});

$events->afterBuild(GenerateTagFeeds::class);


