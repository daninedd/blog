<?php
namespace App\Admin\Validate;

class Article{

    public static $nicename = [
        'first_title' => '一级标题',
        'second_title' => '二级标题',
        'description' => '文章描述',
        'img' => '文章主图',
        'categories' => '分类',
        'private' => '文章私有',
        'stat' => '草稿',
        'user_id' => '用户id',
    ];

    public static $rules = [
        'first_title' => 'required|string|max:30',
        'second_title' => 'required|max:100',
        'description' => 'required',
        'img' => 'required',
        'categories' => 'required|array',
        'private' => 'in:0,1',
        'stat' => 'in:0,1',
        'user_id' => 'required|integer',
    ];

}