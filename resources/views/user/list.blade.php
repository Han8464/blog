@extends('app')

@section('title', '文章列表')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3>Hello, world!</h3>
        </div>
    </div>
    @foreach ($articles as $article)

        <p><a href="/post/{{$article["id"]}}">{{$article["title"]}}</a></p>
    @endforeach

@endsection
