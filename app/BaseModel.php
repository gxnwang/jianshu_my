<?php
/**
 * Created by PhpStorm.
 * User: GJY
 * Date: 2018/10/12
 * Time: 21:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    protected $guarded = [];    // 不可以注入的字段
}