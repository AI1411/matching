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
            $table->string('account_name');
            $table->string('image')->nullable();
            $table->string('gender');
            $table->bigInteger('points')->default(10);
            $table->unsignedBigInteger('role_id')->default(1);
            $table->unsignedBigInteger('age');
            $table->unsignedBigInteger('pref_id');
            $table->text('introduce')->nullable();
            $table->string('hobby_1')->nullable();
            $table->string('hobby_2')->nullable();
            $table->string('hobby_3')->nullable();
            $table->unsignedBigInteger('likes_count');
            $table->bigInteger('favorites_count');
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
