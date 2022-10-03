<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisSetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:set {key} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = $this->argument('key');
        $value = $this->argument('value');

        Redis::set($key, $value);

        $this->info('The key has been successfully set.');
        
        return Command::SUCCESS;
    }
}
