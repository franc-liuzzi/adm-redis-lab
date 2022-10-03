<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisPushCommand extends Command
{
    protected $signature = 'redis:push {key} {value}';
    protected $description = 'Command description';
    public function handle()
    {
        $key = $this->argument('key');
        $value = $this->argument('value');

        Redis::rpush($key, $value);
        $this->info('ok');

        return Command::SUCCESS;
    }
}
