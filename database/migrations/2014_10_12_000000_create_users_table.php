<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('email')->unique();
            $table->boolean('email_verified_at')->default(false);
            $table->string('password');
            $table->string('phone_number')->default(null);
            $table->string('birthday')->default(null);
            $table->rememberToken()->default(null);


        });
    }

    /**
     * Reverse the migrations     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
