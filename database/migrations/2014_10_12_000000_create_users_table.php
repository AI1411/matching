<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('account_name')->nullable();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('points')->default(10);
            $table->unsignedBigInteger('role_id')->default(1);
            $table->string('age')->nullable();
            $table->unsignedBigInteger('pref_id')->default(1)->nullable();
            $table->text('introduce')->nullable();
            $table->string('hobby_1')->nullable();
            $table->string('hobby_2')->nullable();
            $table->string('hobby_3')->nullable();
            $table->unsignedBigInteger('likes_count')->nullable();
            $table->bigInteger('favorites_count')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
