<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id')->comment('文章id');
            $table->unsignedInteger('comments_id')->comment('评论id');
            $table->unsignedInteger('user_id')->comment('收到回复的用户id');
            $table->unsignedInteger('restore_id')->comment('回复者id');
            $table->text('content')->comment('回复内容');
            $table->timestamp('restore_time')->comment('回复时间');
            $table->timestamps();

            //添加外键和索引
            //$table->foreign('article_id')->references('id')->on('articles');
            //$table->foreign('comments_id')->references('id')->on('comments');
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('restore_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restores');
    }
}
