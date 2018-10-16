<?php

namespace App\Http\Controllers;

use App\Post;
use App\Validate\CreatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 列表
    public function index(){
        $posts = Post::orderBy('created_at','desc') -> paginate(6);
        return view('post/index',compact('posts'));
    }
    // 详情页
    public function show(Post $post){
        return view('post/show',compact('post'));
    }
    // 创建页面
    public function create(){
        return view('post/create');
    }
    // 创建逻辑
    public function store(){
        (new CreatePost()) ->goCheck();
        $data = request(['title','content']);
        $post = Post::create(request(['title','content']));
        return redirect("/posts");
    }
    // 编辑页面
    public function edit(){
        return view('post/edit');
    }
    // 编辑逻辑
    public function update(){

    }
    // 删除逻辑
    public function delete(){

    }
    // 上传图片
    public function imageUpload(Request $request){
        $fileCharacter = $request ->file('wangEditorFile') ;
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



        $result = [
            'errno' =>0,
            'data' =>[
                asset('storage/'.$re)
            ]
        ];
        return json_encode($result);
//        dd(request()->all());
    }
}
