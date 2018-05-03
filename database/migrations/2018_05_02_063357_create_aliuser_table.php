<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAliuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliuser', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_wxuser')->unique()->comment('主表id_user');
            $table->string('user_status','5');
            $table->string('is_mobile_auth','5');
            $table->string('gender','5');
            $table->string('province','80');
            $table->string('city','100');
            $table->string('is_licence_auth','5');
            $table->string('avatar','200');
            $table->string('is_certify_grade_a','5');
            $table->string('is_student_certified','5');
            $table->string('user_type_value','5');
            $table->string('is_bank_auth','5');
            $table->string('is_id_auth','5');
            $table->string('ali_user_id','200');
            $table->string('alipay_user_id','5');
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
        Schema::dropIfExists('aliuser');
    }
}
