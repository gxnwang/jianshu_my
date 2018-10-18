<?php
/**
 * Created by PhpStorm.
 * User: GJY
 * Date: 2018/10/14
 * Time: 1:13
 */

namespace App\Validate;


class IDMustByPositive extends BaseValidate {
    protected $rules = [
        'id' => 'required|integer',

    ];
    protected $message = [
        'id.required' => 'id不能为空',

    ];



}