<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login_id')
                ->unique()
                ->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('user_name')->nullable(false);
            $table->foreignId('type_id')
                ->nullable(false)
                ->constrained('user_types');
            $table->foreignId('group_id')
                ->nullable(false)
                ->constrained('groups');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['group_id']);
        });
        Schema::dropIfExists('users');
    }
};
