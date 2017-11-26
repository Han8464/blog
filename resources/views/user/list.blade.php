<html>
<body>
    @foreach ($articles as $article)
        <p><a href="/post/{{$article["id"]}}">{{ $article["title"] }}</a></p>
    @endforeach
</body>
</html>