<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id')->comment('文章id');
            $table->unsignedInteger('user_id')->comment('评论者id');
            $table->text('content')->comment('评论类容');
            $table->unsignedInteger('author_id')->comment('被评论用户id');
            $table->timestamp('comment_time')->comment('评论时间');
            $table->timestamps();
            $table->softDeletes()->comment("软删除时间");

            //添加索引和外键
            $table->index('article_id');
            //$table->foreign('article_id')->references('id')->on('articles');
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('author_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
