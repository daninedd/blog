<?php

namespace App;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $first_title 文章一级标题
 * @property string $second_title 文章二级标题
 * @property string $description 文章描述
 * @property string $img 文章主图
 * @property int $user_id 用户Id
 * @property string $body 文章类容
 * @property string $tags 文章标签
 * @property int $private 文章类容
 * @property int $categories_id 分类id
 * @property int $stat 0:草稿,1:发布
 * @property int $click_times 点击次数
 * @property string|null $publish_time 发布时间
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at 软删除时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereClickTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereFirstTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePublishTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereSecondTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereStat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUserId($value)
 * @mixin \Eloquent
 */
class Article extends Model
{

    protected function setUserIdAttribute(){
       $this->attributes['user_id'] =  Admin::user()->id;
    }
}
