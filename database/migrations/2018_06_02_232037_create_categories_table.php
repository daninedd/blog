<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->charset('utf8')->comment("分类名称");
            $table->unsignedInteger('parent_id')->comment("父级分类id");
            $table->unsignedInteger('user_id')->comment("用户id");
            $table->smallInteger('sort')->comment("排序");
            $table->timestamps();
            $table->softDeletes()->comment("软删除时间");

            //添加索引
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
