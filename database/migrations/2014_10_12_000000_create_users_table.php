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
            $table->increments('id');
            $table->integer('phone')->unique()->comment('手机号');
            $table->integer('name')->comment('姓名');
            $table->integer('email')->unique()->comment('邮箱');
            $table->string('credit')->comment('积分');
            $table->string('card_no')->unique();
            $table->string('rank')->index()->comment('会员等级');
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
