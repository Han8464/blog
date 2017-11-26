<html>
    <body>
    <form action="/admin/logout" method="post">
        {{ csrf_field() }}
        <input type="submit" value="注销">
        <br>
    </form>
    <form action="/admin/post/create" method="POST">
        {{ csrf_field() }}
        标题:<br>
        <input type="text" name="title">
        <br>
        正文：<br>
        <textarea name="content" rows="10" cols="30"></textarea>
        <br>
        <input type="submit" value="提交">
    </form>


    </body>
</html>