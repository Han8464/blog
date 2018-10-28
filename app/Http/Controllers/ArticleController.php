<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function show_list() {
        $articles = Article::all();
        return view('user.list', ['articles'=>$articles]);
    }
    public function show_content($id){
        $article = Article::find($id);
        return view('user.article', ['article' => $article]);
    }



}
