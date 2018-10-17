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
            $table->string('name')->unique()->comment('部门名称,不能出现重复');
            $table->string('manager')->comment('部门主管');
            $table->string('phone')->comment('科室电话号码');
            $table->string('remarks')->nullable()->comment('备注信息');
            $table->unsignedInteger('order')->nullable()->comment('顺序号，用于默认排序');
            $table->string('status')->comment('用户是否启用');
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
