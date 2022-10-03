<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisPopCommand extends Command
{
    protected $signature = 'redis:pop {key}';
    protected $description = 'Command description';
    public function handle()
    {
        $key = $this->argument('key');

        $value = Redis::rpop($key);
        $this->info('popped value is: ' . $value);

        return Command::SUCCESS;
    }
}
