<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Blog;
use App\TagBlog;
use App\ArtistBlog;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    $cond_title = $request->cond_title;
        // dd(__LINE__);
    if ($cond_title != '') {
    // 検索されたら検索結果を取得する(部分一致可)
        $posts = Blog::where('palody_title', 'like', '%'.$cond_title.'%')
                       ->orWhere('palody_tag', 'like', '%' .$cond_title. '%')
                       ->get();
                       
    } else {
    // それ以外はすべてのニュースを取得する
        $posts = Blog::all();
    }
    // dd($posts);
    
    $palodies_posts = DB::table('blogs')->get();
    $artists_posts = DB::table('artist_blogs')->get();
    $tags_posts = DB::table('tag_blogs')->get();
    
    return view('member.search', ['posts' => $posts, 
                                  'cond_title' => $cond_title,
                                  'palodies_posts' => $palodies_posts,
                                  'tags_posts' => $tags_posts,
                                  'artists_posts' => $artists_posts
                                  ]);
                                    
    }    
    
   
}

