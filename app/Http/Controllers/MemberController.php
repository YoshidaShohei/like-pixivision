<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class MemberController extends Controller
{
    public function index(Request $request)
    {
    $cond_title = $request->cond_title;
        // dd(__LINE__);
    if ($cond_title != '') {
    // 検索されたら検索結果を取得する(部分一致可)
        $posts = Blog::where('title', 'like', '%'.$cond_title.'%')->get();
    } else {
    // それ以外はすべてのニュースを取得する
        $posts = Blog::all();
    }
        return view('member/index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }    
}
