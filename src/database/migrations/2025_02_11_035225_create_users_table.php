<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use packages\Domain\Models\Enums\UserRoleType;

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
            $table->string('name')->nullable(false);
            $table->enum('type_id', UserRoleType::values())->nullable(false);
            $table->integer('group_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
