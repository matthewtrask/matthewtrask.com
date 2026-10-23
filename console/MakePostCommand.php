<?php

namespace App\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'make:post', description: 'Scaffold a new blog post with front matter.')]
class MakePostCommand extends Command
{
    private const DEFAULT_COVER = '/assets/img/post-cover-image-2.png';

    public function __construct(private string $postsDir)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('title', InputArgument::OPTIONAL, 'The post title')
            ->addOption('slug', 's', InputOption::VALUE_REQUIRED, 'Filename slug (defaults to a slug of the title)')
            ->addOption('description', 'd', InputOption::VALUE_REQUIRED, 'One-line description used for previews and feeds')
            ->addOption('categories', 'c', InputOption::VALUE_REQUIRED, 'Comma separated categories, e.g. software,culture')
            ->addOption('cover', null, InputOption::VALUE_REQUIRED, 'Cover image path', self::DEFAULT_COVER)
            ->addOption('date', null, InputOption::VALUE_REQUIRED, 'Publish date (anything strtotime understands)', 'today')
            ->addOption('draft', null, InputOption::VALUE_NONE, 'Set published: false so the post is filtered out of builds')
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite the file if it already exists');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $title = $input->getArgument('title');

        if (! $title && ! $this->canPrompt($input)) {
            $io->error('A title is required. Pass it as an argument: make:post "Some title".');

            return Command::FAILURE;
        }

        $title ?: $title = $io->askQuestion(
            (new Question('Title'))->setValidator($this->required('A title is required.')),
        );

        $description = $input->getOption('description')
            ?? ($this->canPrompt($input) ? $io->ask('Description') : null);

        $categories = $input->getOption('categories')
            ?? ($this->canPrompt($input) ? $io->ask('Categories (comma separated)') : null);

        $timestamp = strtotime((string) $input->getOption('date'));

        if ($timestamp === false) {
            $io->error(sprintf('Could not understand the date "%s".', $input->getOption('date')));

            return Command::FAILURE;
        }

        $slug = $this->slug($input->getOption('slug') ?: $title);
        $path = $this->postsDir . '/' . $slug . '.md';

        if (file_exists($path) && ! $input->getOption('force')) {
            $io->error(sprintf('%s already exists. Pass --force to overwrite it.', $this->relative($path)));

            return Command::FAILURE;
        }

        if (! is_dir($this->postsDir)) {
            $io->error(sprintf('Posts directory %s does not exist.', $this->relative($this->postsDir)));

            return Command::FAILURE;
        }

        file_put_contents($path, $this->stub(
            title: $title,
            date: date('Y-m-d', $timestamp),
            description: (string) $description,
            cover: (string) $input->getOption('cover'),
            categories: $this->categories((string) $categories),
            published: ! $input->getOption('draft'),
        ));

        $io->success(sprintf('Created %s', $this->relative($path)));
        $io->comment('Category pages are generated at build time, so new categories need no extra files.');

        return Command::SUCCESS;
    }

    private function stub(
        string $title,
        string $date,
        string $description,
        string $cover,
        array $categories,
        bool $published,
    ): string {
        $lines = [
            '---',
            'extends: _layouts.post',
            'section: content',
            'title: ' . $this->yaml($title),
            'date: ' . $date,
            'description: ' . $this->yaml($description),
            'cover_image: ' . $cover,
            'categories: [' . implode(', ', $categories) . ']',
            'published: ' . ($published ? 'true' : 'false'),
            '---',
            '',
            '',
        ];

        return implode("\n", array_map(rtrim(...), $lines));
    }

    /**
     * Quote a scalar when YAML would otherwise choke on it, or read it as
     * something other than a string.
     */
    private function yaml(string $value): string
    {
        if ($value === '') {
            return '';
        }

        if (preg_match('/^[\w(\[]/u', $value) && ! str_contains($value, ': ') && ! str_ends_with($value, ':')) {
            return $value;
        }

        return "'" . str_replace("'", "''", $value) . "'";
    }

    /** @return string[] */
    private function categories(string $raw): array
    {
        $categories = array_filter(array_map(
            fn (string $category) => $this->slug($category),
            explode(',', $raw),
        ));

        return array_values(array_unique($categories));
    }

    private function slug(string $value): string
    {
        $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $value);

        return trim(strtolower((string) $slug), '-');
    }

    /**
     * Without a terminal attached -- a script, a pipeline, an agent shelling
     * out -- questions would read EOF and abort, so skip them and let the
     * options stand on their own.
     */
    private function canPrompt(InputInterface $input): bool
    {
        return $input->isInteractive() && stream_isatty(STDIN);
    }

    private function required(string $message): callable
    {
        return function (?string $answer) use ($message): string {
            if (trim((string) $answer) === '') {
                throw new \RuntimeException($message);
            }

            return trim($answer);
        };
    }

    private function relative(string $path): string
    {
        return str_replace(dirname($this->postsDir, 2) . '/', '', $path);
    }
}
