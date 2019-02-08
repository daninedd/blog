<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name 分类名称
 * @property int $user_id 创建该分类的用户id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $article
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUserId($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = ['name', 'user_id'];


    /**
     * 关联用户
    */
    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * 关联文章
    */
    public function article(){
        return $this->belongsToMany(Article::class, 'article_map_category', 'category_id', 'article_id');
    }
}
