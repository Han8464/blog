<html>
    <body>
    <h1>{{ $article["title"] }}</h1>
    <p>
    发布时间：{{ $article["created_at"] }}
    </p>
    <p>
    <div id="content"></div>
    <script src="/editor/lib/marked.min.js"></script>
    <script>
        var content = @json($article["content"]);

        document.getElementById('content').innerHTML =
            marked(content);
    </script>
    </p>
    <form action = "/admin/delete/{{ $article["id"] }}" method = "post">
         {{ csrf_field() }}
         <input type = "submit", value="删除">
    </form>
    <form action="/admin/update/{{ $article["id"] }}" method="post">
        {{ csrf_field() }}
        <input type = "submit", value="修改">
    </form>

    <br>
    </body>
</html>