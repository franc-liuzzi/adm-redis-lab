<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class RedisExistsCommand extends Command
{
    protected $signature = 'redis:exists {key}';
    protected $description = 'Command description';
    public function handle()
    {
        $key = $this->argument('key');

        if (Redis::exists($key)) {
            $this->info("Entry for $key exists");
            return Command::SUCCESS;
        } else {
            $this->error("Entry for $key doesn't exist");
            return Command::FAILURE;
        }
    }
}
