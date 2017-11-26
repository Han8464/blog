<html>
<body>
<form action="/admin/login" method="post" >
    {{ csrf_field() }}
    用户名：
    <br>
    <input type="text" name="username">
    <br>
    密码：
    <br>
    <input type="password" name="psw">
    <br>
    @if(!empty($errmsg))
        <p>{{ $errmsg }}</p>
    @endif
    <input type="submit" value="提交">
</form>
</body>
</html>