<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateOgImages
{
    private const WIDTH  = 1200;
    private const HEIGHT = 630;

    public function handle(Jigsaw $jigsaw): void
    {
        if (! extension_loaded('gd') || ! function_exists('imagefttext')) {
            echo "\nSkipping OG image generation: GD with FreeType is not available.\n";
            return;
        }

        $fontPath = $jigsaw->getSourcePath() . '/assets/fonts/Syne-Bold.ttf';
        if (! file_exists($fontPath)) {
            echo "\nSkipping OG image generation: Syne-Bold.ttf not found.\n";
            return;
        }

        $ogDir = $jigsaw->getDestinationPath() . '/assets/og';
        if (! is_dir($ogDir)) {
            mkdir($ogDir, 0755, true);
        }

        foreach ($jigsaw->getCollection('posts') as $post) {
            $this->generateImage($post, $ogDir, $fontPath);
        }
    }

    private function generateImage($post, string $ogDir, string $fontPath): void
    {
        $img = imagecreatetruecolor(self::WIDTH, self::HEIGHT);
        imagesavealpha($img, true);

        // Background: gray-950
        $bg = imagecolorallocate($img, 3, 9, 18);
        imagefill($img, 0, 0, $bg);

        // Gradient bar at top (cyan-500 → blue-500 → indigo-500)
        $stops = [
            [0.0,  6,  182, 212],
            [0.5, 59,  130, 246],
            [1.0, 99,  102, 241],
        ];
        for ($x = 0; $x < self::WIDTH; $x++) {
            $t = $x / self::WIDTH;
            [$r, $g, $b] = $this->interpolateGradient($t, $stops);
            $c = imagecolorallocate($img, $r, $g, $b);
            imageline($img, $x, 0, $x, 3, $c);
        }

        $white    = imagecolorallocate($img, 249, 250, 251); // gray-50
        $meta     = imagecolorallocate($img, 75,  85,  99);  // gray-600
        $cyan     = imagecolorallocate($img, 8,   145, 178); // cyan-600
        $brand    = imagecolorallocate($img, 107, 114, 128); // gray-500
        $dot      = imagecolorallocate($img, 34,  211, 238); // cyan-400

        $title    = $post->title ?? 'Untitled';
        $date     = date('M Y', $post->date ?? time());
        $category = $post->categories ? $post->categories[0] : '';

        $titleSize = strlen($title) > 60 ? 42 : (strlen($title) > 40 ? 50 : 58);
        $lines     = $this->wrapText($title, $fontPath, $titleSize, self::WIDTH - 128);

        // Layout from bottom up
        $paddingX    = 64;
        $brandY      = self::HEIGHT - 64;
        $titleBottom = $brandY - 48;
        $lineHeight  = (int) ($titleSize * 1.25);
        $titleTop    = $titleBottom - (count($lines) - 1) * $lineHeight;
        $metaY       = $titleTop - 52;

        // Meta line: date · category
        $metaX = $paddingX;
        if ($date) {
            imagefttext($img, 15, 0, $metaX, $metaY, $meta, $fontPath, strtoupper($date));
            $metaX += $this->textWidth($date, $fontPath, 15) + 18;
        }
        if ($date && $category) {
            imagefttext($img, 15, 0, $metaX, $metaY, $meta, $fontPath, '·');
            $metaX += $this->textWidth('·', $fontPath, 15) + 18;
        }
        if ($category) {
            imagefttext($img, 15, 0, $metaX, $metaY, $cyan, $fontPath, $category);
        }

        // Title lines
        $y = $titleTop;
        foreach ($lines as $line) {
            imagefttext($img, $titleSize, 0, $paddingX, $y, $white, $fontPath, $line);
            $y += $lineHeight;
        }

        // Brand dot + domain
        imagefilledellipse($img, $paddingX + 3, $brandY - 4, 8, 8, $dot);
        imagefttext($img, 16, 0, $paddingX + 18, $brandY, $brand, $fontPath, 'matthewtrask.com');

        $outPath = $ogDir . '/' . $post->getFilename() . '.png';
        imagepng($img, $outPath);
    }

    private function wrapText(string $text, string $font, int $size, int $maxWidth): array
    {
        $words = explode(' ', $text);
        $lines = [];
        $line  = '';

        foreach ($words as $word) {
            $test = $line ? "$line $word" : $word;
            if ($this->textWidth($test, $font, $size) <= $maxWidth) {
                $line = $test;
            } else {
                if ($line !== '') {
                    $lines[] = $line;
                }
                $line = $word;
            }
        }

        if ($line !== '') {
            $lines[] = $line;
        }

        return $lines ?: [$text];
    }

    private function textWidth(string $text, string $font, int $size): int
    {
        $box = imageftbbox($size, 0, $font, $text);
        return abs($box[4] - $box[0]);
    }

    private function interpolateGradient(float $t, array $stops): array
    {
        for ($i = 0; $i < count($stops) - 1; $i++) {
            [$t0, $r0, $g0, $b0] = $stops[$i];
            [$t1, $r1, $g1, $b1] = $stops[$i + 1];
            if ($t <= $t1) {
                $ratio = ($t - $t0) / ($t1 - $t0);
                return [
                    (int) round($r0 + ($r1 - $r0) * $ratio),
                    (int) round($g0 + ($g1 - $g0) * $ratio),
                    (int) round($b0 + ($b1 - $b0) * $ratio),
                ];
            }
        }
        return [99, 102, 241];
    }
}
