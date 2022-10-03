<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisListCommand extends Command
{
    protected $signature = 'redis:list {key_pattern?}';
    protected $description = 'Command description';
    public function handle()
    {
        $key_pattern = $this->argument('key_pattern') ?: '*';
        $keys = Redis::keys($key_pattern);

        dump($keys);
        
        return Command::SUCCESS;
    }
}
