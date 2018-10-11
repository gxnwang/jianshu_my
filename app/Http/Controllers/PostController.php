<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 列表
    public function index(){
        $posts = Post::orderBy('created_at','desc') -> paginate(6);
        return view('post/index',compact('posts'));
    }
    // 详情页
    public function show(){
        return view('post/show',['title' => 'this title']);
    }
    // 创建页面
    public function create(){
        return view('post/create');
    }
    // 创建逻辑
    public function store(){

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
}
