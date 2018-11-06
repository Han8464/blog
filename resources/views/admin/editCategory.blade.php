@extends('admin')

@section('title', '编辑类别')

@section('content')

    <table class="table table-hover text-center">
        <tr>
            <th class="text-center">名称</th>
            <th class="text-center">操作</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category["categoryName"]}}</td>
                <td>
                    <div class="col-md-offset-4 col-md-2">
                        <form action="/admin/delete_category/{{ $category["id"] }}" method="post">
                            {{ csrf_field() }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form action="/admin/update_category/{{ $category["id"] }}" method="post">
                            {{ csrf_field() }}
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-{{ $category["id"] }}">
                                修改
                            </button>
                            <div class="modal fade" id="modal-{{ $category["id"] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{$category["id"]}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel-{{$category["id"]}}">修改类别</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/update_category/{{ $category["id"] }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="message-{{ $category["id"] }}" class="control-label">类别名称:</label>
                                                    <input type="text" class="form-control" name="categoryName" id="message-{{ $category["id"] }}" value="{{$category["categoryName"]}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                    <button type="submit" class="btn btn-primary">保存修改</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <button type="button" class="btn btn-primary btn-default col-md-offset-8" data-toggle="modal" data-target="#myModal">
        添加类别
    </button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加类别</h4>
                </div>
                <div class="modal-body">
                    <form action="/admin/addCategory" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="message-text" class="control-label">类别名称:</label>
                            <input type="text" class="form-control" name="categoryName" id="message-text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"关闭</button>
                            <button type="submit" class="btn btn-primary">保存修改</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


