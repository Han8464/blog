<html>
    <body>
    <form action="/create" method="POST">
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