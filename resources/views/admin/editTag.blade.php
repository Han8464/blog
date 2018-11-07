@extends('admin')

@section('title', '编辑标签')

@section('content')

    <table class="table table-hover text-center">
        <tr>
            <th class="text-center">名称</th>
            <th class="text-center">操作</th>
        </tr>
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag["name"]}}</td>
                <td>
                    <div class="col-md-offset-4 col-md-2">
                        <form action="/admin/delete_tag/{{ $tag["id"] }}" method="post">
                            {{ csrf_field() }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form action="/admin/update_tag/{{ $tag["id"] }}" method="post">
                            {{ csrf_field() }}
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-{{ $tag["id"] }}">
                                修改
                            </button>
                            <div class="modal fade" id="modal-{{ $tag["id"] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{$tag["id"]}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel-{{$tag["id"]}}">修改标签</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/update_tag/{{ $tag["id"] }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="message-{{ $tag["id"] }}" class="control-label">标签名称:</label>
                                                    <input type="text" class="form-control" name="tagName" id="message-{{ $tag["id"] }}" value="{{$tag["name"]}}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                        <button type="submit" class="btn btn-primary">保存修改</button>
                                                    </div>
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
        添加标签
    </button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加标签</h4>
                </div>
                <div class="modal-body">
                    <form action="/admin/addTag" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="message-text" class="control-label">标签名称:</label>
                            <input type="text" class="form-control" name="tagName" id="message-text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">保存修改</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


