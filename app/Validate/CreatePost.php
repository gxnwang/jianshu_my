<?php
/**
 * Created by PhpStorm.
 * User: GJY
 * Date: 2018/10/14
 * Time: 1:34
 */

namespace App\Validate;


class CreatePost extends BaseValidate {
    protected $rules = [
        'title' => 'required|string|max:100|min:5',
        'content' => 'required|string|min:10'
    ];
    protected $message = [
        'title.required' => '标题不能为空',
        'title.string' => '标题必须是字符串',
        'title.max' =>'标题最长100个字符',
        'title.min' => '标题最短5个字符',
        'content.required' =>'内容不能为空',
        'content.string' =>'内容必须是字符串',
        'content.min' =>'内容最短5个字符'
    ];
}