<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LogTimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log de tiempo actual';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('El momento en que se ejecuto esto fue: ' . now());
    }
}
