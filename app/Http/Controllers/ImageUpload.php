<?php
/**
 * Created by PhpStorm.
 * User: GJY
 * Date: 2018/10/16
 * Time: 22:56
 */

namespace App\Http\Controllers;


class ImageUpload extends Controller {
    public function imageUpload(Request $request,$file = 'img'){
        $fileCharacter = $request ->file($file) ;
        //$re = $path  ->store(time());
        if($fileCharacter -> isValid()){

            // 获取文件的扩展名
            $ext = $fileCharacter -> getClientOriginalExtension();
            // 获取文件的绝真实地址（临时文件）
            $path = $fileCharacter -> getRealPath();

            //$filename = date('Y-m-d-H-i-s').'.'.$ext;
            // 自己设定文件名
            $filename = date('Y').'/'.date('m').'/'.date('d').'/'.time().'.'.$ext;
            // 存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            $re = Storage::disk('public') ->put($filename,file_get_contents($path));
        }
        $allpath = asset('storage/'.$filename);
        dd($ext,$path,$filename,$allpath,$re);




    }

    public function wangEditorUpload(){
        $path = $this -> imageUpload('wangEditorFile');
//        dd($path);
//
//        $result = [
//            'errno' =>0,
//            'data' =>[
//                asset('storage/'.$re)
//            ]
//        ];
//        return json_encode($result);
//        dd(request()->all());
    }
}