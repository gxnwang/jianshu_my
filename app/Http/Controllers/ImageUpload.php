<?php
/**
 * Created by PhpStorm.
 * User: GJY
 * Date: 2018/10/16
 * Time: 22:56
 */

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUpload extends Controller {
    protected $file = 'img';
    protected $path = '';
    protected $truePath = 'storage/';
    protected $disk = 'public';

    public function __construct() {
        $this -> path = date('Y').'/'.date('m').'/'.date('d').'/';
    }

    /**
     * 上传逻辑
     * @param $request
     * @return string
     */
    public function imageUpload($request){
        $fileCharacter = $request ->file($this -> file) ;
        //$re = $path  ->store(time());
        if($fileCharacter -> isValid()){

            // 获取文件的扩展名
            $ext = $fileCharacter -> getClientOriginalExtension();
            // 获取文件的绝真实地址（临时文件）
            $path = $fileCharacter -> getRealPath();

            // 自己设定文件名
            $filename = $this -> path .time().'.'.$ext;
            // 存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            $re = Storage::disk($this -> disk) ->put($filename,file_get_contents($path));
            if($re){
                return asset($this -> truePath .$filename);
            }
        }
    }

    /**
     * 通过wangEditor提交的图片上传
     * @param Request $request
     * @return string
     */
    public function wangEditorUpload(Request $request){

        $this -> file = 'wangEditorFile';
        $path = $this -> imageUpload($request);

        $result = [
            'errno' =>0,
            'data' =>[$path]
        ];
        return json_encode($result);
    }
}