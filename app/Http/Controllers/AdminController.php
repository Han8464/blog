<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('admin.edit', ['is_create' => true]);
    }

    public function create(Request $request){

        $title = $request->input('title');
        $content = $request->input('content');
        $article = new Article();
        $article['title'] = $title;
        $article['content'] = $content;
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
        return view('admin.edit', ['is_create' => false, 'article' => $article]);
    }

    public function update_save($id, Request $request)
    {
        $new_title = $request->input('title');
        $new_content = $request->input('content');
        $article = Article::find($id);
        $article['title'] = $new_title;
        $article['content'] = $new_content;
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
        $category['categoryName'] = $categoryName;
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
        $category['categoryName'] = $request->input('categoryName');
        $category->save();
        return redirect('/admin/editCategory');
    }


}
