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
    public function edit(Post $post){

        return view('post/edit',compact('post'));
    }
    // 编辑逻辑
    public function update(Post $post){
        (new CreatePost()) ->goCheck();

        $post -> title = request('title');
        $post -> content = request('content');
        $post -> save();

        return redirect('/posts/'.$post -> id);
    }
    // 删除逻辑
    public function delete(){

    }

}
