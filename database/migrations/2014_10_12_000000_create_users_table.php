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
            $table->increments('id')->comment('唯一编码');
            $table->string('name')->comment('姓名');
            $table->string('nick_name')->nullable()->comment('别名');
            $table->string('gender')->comment('性别');
            $table->dateTime('birthday')->nullable()->comment('出生日期');
            $table->string('email')->unique()->comment('Email');
            $table->smallInteger('is_active')->default(0)->comment('用户是否激活了邮箱验证，默认是没激活');
            $table->string('department')->nullable()->comment('所在部门');
            $table->string('education')->nullable()->comment('学历');
            $table->string('title')->nullable()->comment('职称');
            $table->string('post')->nullable()->comment('职务');
            $table->string('phone')->nullable()->comment('电话号码');
            $table->string('sf_id')->nullable()->comment('身份证号码');
            $table->string('remarks')->nullable()->comment('备注信息');
            $table->string('status')->default('T')->comment('用户是否有效，默认是有效');
            $table->unsignedInteger('order')->nullable()->comment('顺序号，用于默认排序');
            $table->string('password')->comment('密码');
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
