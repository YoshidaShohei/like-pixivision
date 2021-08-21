<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\TagBlog;
use App\ArtistBlog;

class MemberController extends Controller
{
    public function index(Request $request)
    {
    
        $palodies_posts = DB::table('blogs')->get();
        $artists_posts = DB::table('artist_blogs')->get();
        $tags_posts = TagBlog::all();
    
        $blogs = Blog::all();
    
        return view('member.index', [
            'palodies_posts' => $palodies_posts,
            'tags_posts' => $tags_posts,
            'artists_posts' => $artists_posts,
            'blogs' => $blogs,
        ]);
    }    
}
