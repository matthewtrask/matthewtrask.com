<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateCategoryPages
{
    public function handle(Jigsaw $jigsaw)
    {
        $sourceDir     = $jigsaw->getSourcePath();
        $postsDir      = $sourceDir . '/_posts';
        $categoriesDir = $sourceDir . '/_categories';

        if (! is_dir($postsDir)) {
            return;
        }

        $found = [];
        foreach (glob($postsDir . '/*.md') as $file) {
            $contents = file_get_contents($file);
            if (preg_match('/^---\s*\n(.*?)\n---/s', $contents, $block)) {
                if (preg_match('/^categories:\s*\[([^\]]*)\]/m', $block[1], $m)) {
                    foreach (explode(',', $m[1]) as $cat) {
                        $found[] = trim($cat, " \t\"'");
                    }
                }
            }
        }

        foreach (array_unique(array_filter($found)) as $category) {
            $path = $categoriesDir . '/' . $category . '.md';
            if (! file_exists($path)) {
                $title = ucwords($category);
                file_put_contents($path, implode("\n", [
                    '---',
                    'extends: _layouts.category',
                    "title: {$title}",
                    "description: Posts about {$category}.",
                    '---',
                    '',
                ]));
            }
        }
    }
}
