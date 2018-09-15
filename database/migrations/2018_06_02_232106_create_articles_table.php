<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_title', 255)->comment("文章一级标题");
            $table->string('second_title', 255)->comment("文章二级标题");
            $table->text('description')->comment("文章描述");
            $table->string('img', 255)->comment("文章主图");
            $table->unsignedInteger('user_id')->comment('用户Id');
            $table->longtext('body')->comment("文章类容");
            $table->string('tags', 255)->comment("文章标签");
            $table->boolean('private')->comment("文章类容");
            $table->unsignedInteger('categories_id')->comment("分类id");
            $table->tinyInteger('stat')->comment("0:草稿,1:发布");
            $table->unsignedInteger('click_times')->comment("点击次数");
            $table->timestamp('publish_time')->nullable()->comment("发布时间");
            $table->timestamps();
            $table->softDeletes()->comment("软删除时间");
            //添加外键和索引
            $table->index('user_id');
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            //$table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
