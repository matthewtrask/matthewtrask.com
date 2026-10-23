<?php

namespace App\Listeners;

use Symfony\Component\Yaml\Yaml;
use TightenCo\Jigsaw\Jigsaw;

/*
 * Hand-picked `related:` and `follows:` slugs are resolved against the posts
 * collection, so a typo or a draft just silently vanishes from the page. Say so
 * at build time instead.
 */
class ValidateRelatedPosts
{
    public function handle(Jigsaw $jigsaw)
    {
        $postsDir = $jigsaw->getSourcePath() . '/_posts';

        if (! is_dir($postsDir)) {
            return;
        }

        $frontMatter = [];

        foreach (glob($postsDir . '/*.md') as $file) {
            if (! preg_match('/^---\s*\n(.*?)\n---/s', file_get_contents($file), $block)) {
                continue;
            }

            try {
                $frontMatter[pathinfo($file, PATHINFO_FILENAME)] = Yaml::parse($block[1]) ?? [];
            } catch (\Throwable) {
                // Jigsaw will complain about unparseable front matter itself.
            }
        }

        $isPublished = [];

        foreach ($frontMatter as $slug => $data) {
            $isPublished[strtolower($slug)] = ($data['published'] ?? true) !== false;
        }

        foreach ($frontMatter as $slug => $data) {
            $referenced = [
                'related' => is_array($data['related'] ?? null) ? $data['related'] : [],
                'follows' => is_array($data['follows'] ?? null)
                    ? $data['follows']
                    : array_filter([$data['follows'] ?? null], 'is_scalar'),
            ];

            foreach ($referenced as $field => $entries) {
                foreach ($entries as $entry) {
                    $key = strtolower(pathinfo((string) $entry, PATHINFO_FILENAME));

                    if (! array_key_exists($key, $isPublished)) {
                        $this->warn("{$slug}.md: {$field} post '{$entry}' does not exist.");
                    } elseif (! $isPublished[$key]) {
                        $this->warn("{$slug}.md: {$field} post '{$entry}' is a draft, so it will not be linked.");
                    }
                }
            }
        }
    }

    private function warn(string $message): void
    {
        fwrite(STDERR, "   WARN  {$message}\n");
    }
}
