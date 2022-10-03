<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comuni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provincia_id')->references('id')->on('province');
            $table->string('name');
        });
    }
    public function down()
    {
        Schema::dropIfExists('comuni');
    }
};
