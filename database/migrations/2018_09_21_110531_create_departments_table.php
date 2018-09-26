<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id')->comment('唯一编码');
            $table->unsignedInteger('pid')->nullable()->comment('上级部门id');
            $table->string('name')->comment('部门名称');
            $table->string('manager')->nullable()->comment('部门主管');
            $table->string('phone')->nullable()->comment('科室电话号码');
            $table->string('remarks')->nullable()->comment('备注信息');
            $table->unsignedInteger('order')->nullable()->comment('顺序号，用于默认排序');
            $table->string('status')->default('T')->comment('用户是否有效，默认是有效');
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
        Schema::dropIfExists('departments');
    }
}
