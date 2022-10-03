<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisGetCommand extends Command
{
    protected $signature = 'redis:get {key}';
    protected $description = 'Get redis value';
    public function handle()
    {
        $key = $this->argument('key');
        $value = Redis::get($key);

        $this->info("The value for key `$key` is `$value`");

        return Command::SUCCESS;
    }
}
