@extends("layout.main")

@section("content")
<div class="col-sm-8 blog-main">
    <form action="/posts" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label>标题</label>
            <input name="title" type="text" class="form-control" placeholder="这里是标题">
        </div>
        <div class="form-group">
            <label>内容</label>
            <div id="editor">
                <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
            </div>
            <textarea id="content" name="content" style="display:none;"></textarea>
        </div>
        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors-> all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
        @endif
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    <br>

</div><!-- /.blog-main -->
@endsection