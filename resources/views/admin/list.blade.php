@extends('admin')

@section('title', '管理文章')

@section('content')
    <table class="table table-hover text-center">
        <tr>
            <th class="text-center">标题</th>
            <th class="text-center">日期</th>
            <th class="text-center">操作</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>
                    c
                </td>
                <td>{{$article["created_at"]}}</td>
                <td>
                    <div class="col-md-offset-4 col-md-2">
                    <form action="/admin/delete/{{ $article["id"] }}" method="post">
                        {{ csrf_field() }}
                        <input type="submit" value="删除" class="btn btn-danger">
                    </form>
                    </div>
                    <div class="col-md-2">
                    <form action="/admin/update/{{ $article["id"] }}" method="post">
                        {{ csrf_field() }}
                        <input type="submit" value="修改" class="btn btn-default">
                    </form>
                    </div>


                </td>
            </tr>
        @endforeach


    </table>



@endsection