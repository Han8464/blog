<?php

namespace App\Http\Controllers;

use App\Article;
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
                session(['is_login'=> true]);
                return redirect('/admin/post/create');
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
