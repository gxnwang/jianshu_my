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
        'title.string' => '标题必须是字符串'
    ];
}