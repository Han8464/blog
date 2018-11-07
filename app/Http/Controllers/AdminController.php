<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Tag;

class AdminController extends Controller
{
    //
    public function show_login(Request $request){
        $is_login = session('is_login',false);
        if($is_login){
            return redirect('/admin/post/create');
        }
        $errmsg = $request->input('errmsg');
        return view('admin.login', ['errmsg' => $errmsg]);
    }

    public function login(Request $request) {
        $user = User::where('username', $request->input('username'))->first();
        if(!$user) {
            return redirect('/admin/login?errmsg=用户不存在');
        }else {
            $password = $user->password;
            if($request["psw"] == $password) {
                session(['is_login'=> true, 'username'=>$user['username']]);
                return redirect('/admin/list');
            }else{
                return redirect('/admin/login?errmsg=密码错误');
            }
        }

    }
    public function logout(){
        session(['is_login'=>false]);
        return redirect('/admin/login');
    }

    public function show_create(){
        $categories = Category::all();
        return view('admin.edit', ['is_create' => true, 'categories' => $categories]);
    }

    public function create(Request $request){

        $title = $request->input('title');
        $content = $request->input('content');
        $article = new Article();
        $article['title'] = $title;
        $article['content'] = $content;
        $article['category_id'] = $request->input('category_id');
        $article->save();
        return redirect('/admin/list');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/post');
    }

    public function update($id)
    {
        $article = Article::find($id);
        $mycategory = Category::find($article['category_id']);
        $categories = Category::all();
        return view('admin.edit', ['is_create' => false, 'article' => $article, 'mycategory' => $mycategory, 'categories' => $categories]);
    }

    public function update_save($id, Request $request)
    {
        $new_title = $request->input('title');
        $new_content = $request->input('content');
        $article = Article::find($id);
        $article['title'] = $new_title;
        $article['content'] = $new_content;
        $article['category_id'] = $request->input('category_id');
        $article->save();
        return redirect('/admin/list');
    }

    public function show_list()
    {
        $articles = Article::all();
        return view('admin.list', ['articles'=>$articles]);
    }

    public function show_edit_category()
    {
        $categories = Category::all();
       return view('admin.editCategory', ['categories'=>$categories]);
    }

    public function add_category(Request $request)
    {
        $categoryName = $request->input('categoryName');
        $category = new Category();
        $category['name'] = $categoryName;
        $category->save();
        return redirect('/admin/editCategory');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin/editCategory');
    }

    public function update_category($id, Request $request)
    {
        $category = Category::find($id);
        $category['name'] = $request->input('categoryName');
        $category->save();
        return redirect('/admin/editCategory');
    }

    public function show_edit_tag()
    {
        $tags = Tag::all();
        return view('admin.editTag', ['tags' => $tags]);
    }

    public function add_tag(Request $request)
    {
        $tagName = $request->input('tagName');
        $tag = new Tag();
        $tag['name'] = $tagName;
        $tag->save();
        return redirect('/admin/editTag');
    }
    public function delete_tag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/admin/editTag');
    }

    public function update_tag($id, Request $request)
    {
        $tag = Tag::find($id);
        $tag['name'] = $request->input('tagName');
        $tag->save();
        return redirect('/admin/editTag');
    }



}