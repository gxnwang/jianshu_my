<?php
/**
 * Created by PhpStorm.
 * User: GJY
 * Date: 2018/10/14
 * Time: 1:20
 */

namespace App\Validate;



use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseValidate {
    use ValidatesRequests;

    protected $rules = [];

    protected $message = [];


    public function goCheck(){
        $errors = $this -> validate(request(), $this->rules,$this -> message);
        dd($errors);
    }
}