<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWeixinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_weixin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unique()->comment('主表id_user');
            $table->string('nickname')->nullable()->comment('用户昵称');
            $table->string('email')->nullable()->comment('用户邮箱');
            $table->string('openid',50)->comment('openid');
            $table->string('unionid',50)->nullable()->comment('unionid');
            $table->tinyInteger('gender')->nullable()->comment('用户性别');
            $table->string('avatar',199)->nullable()->comment('用户性别');
            $table->string('birthday')->nullable();
            $table->string('province',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('lanaguage',100)->nullable();

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
        Schema::dropIfExists('user_weixin');
    }
}
