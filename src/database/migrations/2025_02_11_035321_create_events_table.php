<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->dateTime('start_time')->nullable(false);
            $table->dateTime('end_time')->nullable(false);
            $table->string('location')->nullable(false);
            $table->string('group_id')->nullable(false);
            $table->text('detail')->nullable(false);
            $table->foreignId('register_user_id')
                ->nullable()
                ->constrained('users', 'id')
                ->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
