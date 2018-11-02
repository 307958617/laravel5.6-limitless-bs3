<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->comment('描述');
            $table->unsignedInteger('order')->comment('顺序号，用于排序');
            $table->string('isFirst')->comment('是否为首选');
            $table->string('status')->comment('当前状态');
            $table->string('remarks')->comment('备注');
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
        Schema::dropIfExists('gender');
    }
}
