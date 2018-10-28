<html>
    <head>
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
        <script src="https://cdnjs.loli.net/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="jumbotron col-md-offset-4 col-md-4">
            <h3>Hello, world!</h3>
        </div>
        <div class="col-md-offset-4 col-md-4">
            <form action="/admin/login" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" name="psw" id="password" class="form-control">
                </div>

                @if(!empty($errmsg))
                    <p>{{ $errmsg }}</p>
                @endif
                <input type="submit" value="登录" class="btn btn-block btn-primary">
            </form>
        </div>

    </div>
    </body>
</html>