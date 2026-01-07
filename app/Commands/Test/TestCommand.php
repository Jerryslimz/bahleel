<?php

namespace App\Commands\Test;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test
                          {--filter= : Filter tests by name}
                          {--unit : Run only Unit tests}
                          {--feature : Run only Feature tests}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the test suite';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $command = [PHP_BINARY, 'vendor/bin/pest', '--no-coverage'];

        // Add filter if provided
        if ($this->option('filter')) {
            $command[] = '--filter';
            $command[] = $this->option('filter');
        }

        // Add test directory based on options
        if ($this->option('unit')) {
            $command[] = 'tests/Unit';
        } elseif ($this->option('feature')) {
            $command[] = 'tests/Feature';
        }

        $process = new Process($command, base_path());
        $process->setTimeout(300); // 5 minutes timeout
        $process->setTty(Process::isTtySupported());

        return $process->run(function ($type, $buffer) {
            echo $buffer;
        });
    }
}
