<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisTtlCommand extends Command
{
    protected $signature = 'redis:ttl {key}';
    protected $description = 'Command description';
    public function handle()
    {
        $key = $this->argument('key');
        $ttl = Redis::ttl($key);

        $this->info("TTL for $key is $ttl");
        
        return Command::SUCCESS;
    }
}
