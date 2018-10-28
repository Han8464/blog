<html>
    <head>

        <link rel="stylesheet" href="/editor/css/editormd.min.css" />

        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
        <script src="https://cdnjs.loli.net/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>


    </body>
</html>