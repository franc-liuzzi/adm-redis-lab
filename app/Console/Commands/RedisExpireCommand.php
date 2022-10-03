<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisExpireCommand extends Command
{
    protected $signature = 'redis:expire {key} {ttl}';
    protected $description = 'Command description';
    public function handle()
    {
        $key = $this->argument('key');
        $ttl = $this->argument('ttl');

        Redis::expire($key, $ttl);

        $this->info('ok');
        return Command::SUCCESS;
    }
}
