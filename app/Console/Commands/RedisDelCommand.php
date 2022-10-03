<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisDelCommand extends Command
{
    protected $signature = 'redis:del {key}';
    protected $description = 'Command description';
    public function handle()
    {
        $key = $this->argument('key');
        
        Redis::del($key);

        $this->info("Entry with key `$key` successfully deleted.");

        return Command::SUCCESS;
    }
}
