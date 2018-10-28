@extends('admin')

@section('title', '编辑文章')


@section('content')
    <div class="col-md-12">
        @if($is_create)
            <form action="/admin/post/create" method="POST">
        @else
            <form action="/admin/update_save/{{$article["id"]}}", method="post">
        @endif
            {{ csrf_field() }}
            <div class="col-md-6 form-group">
                <label for="title">文章标题：</label>
                <input id="title" type="text" class="form-control" name="title" placeholder="文章标题" @if(!$is_create)value="{{$article["title"]}}"@endif>
            </div>

            <div class="form-group col-md-12">
                <label for="content">文章正文：</label>
                <div id="editormd" class="form-group">
                    <textarea id="content" style="display:none;" name="content">@if(!$is_create){{ $article['content'] }}@endif</textarea>
                </div>
            </div>
            <br>
            <input class="btn btn-primary col-md-2" type="submit" value="提交">
        </form>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/editor/editormd.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var editor = editormd("editormd", {
                path : "/editor/lib/" // Autoload modules mode, codemirror, marked... dependents libs path
            });
        });
    </script>

@endsection


