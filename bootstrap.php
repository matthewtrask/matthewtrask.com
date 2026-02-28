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

use App\Listeners\GenerateCategoryPages;
use App\Listeners\GenerateIndex;
use App\Listeners\GenerateOgImages;
use App\Listeners\GenerateSitemap;
use App\Listeners\GenerateTagFeeds;

$events->beforeBuild(GenerateCategoryPages::class);

$events->afterBuild(GenerateSitemap::class);
$events->afterBuild(GenerateIndex::class);
$events->afterBuild(GenerateOgImages::class);

$events->afterCollections(function ($jigsaw) {
    $jigsaw->getCollection('posts')->each(function ($post) {
        $wordCount = str_word_count(strip_tags($post->getContent() ?? ''));
        $post->put('readTime', max(1, (int) ceil($wordCount / 200)));
    });
});

$events->afterBuild(GenerateTagFeeds::class);


