<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function show_create(){
        return view('admin.edit');
    }
    public function create(Request $request){
        $title = $request->input('title');
        $content = $request->input('content');
        $article = new Article();
        $article['title'] = $title;
        $article['content'] = $content;
        $article->save();
    }


}
