<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        $post = [
            'title' => "123",
            "content" => "ahsdjfkasd"
        ];
        return view('admin/edit', [
            'post' => $post
        ]);
    }

}
