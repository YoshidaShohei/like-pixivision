<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ArtistBlog;

class ArtistController extends Controller
{
    public function add() 
    {
        return view('admin.blog.artistCreate');
    }

    public function create(Request $request)
    {
    // 以下を追記
    // Varidationを行う
    // $this->validate($request, Blog::$rules);
    
    $artist_blog = new ArtistBlog;
    $form = $request->all();
    
    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    if (isset($form['artist_image_path'])) {
        $artist_path = $request->file('artist_image_path')->store('public/images');
        $artist_blog->artist_image_path = basename($artist_path);
    } else {
        $artist_blog->artist_image_path = null;
    }
    
    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['artist_image_path']);
    // データベースに保存する
    $artist_blog->fill($form);
    $artist_blog->save();
    return redirect('admin/blog/artist/create');
    }
    
    public function index(Request $Request) {
        $artists_posts = DB::table('artistBlogs')->select('artist_title', 'artist_tag', 'artist_image_path')->get();
            return view('member.index', ['artists_post' => $artists_post]);
    }
    
  public function image($id) 
  {
     $artist = ArtistBlog::where('id', $id)
               ->select([
                   'artist_title',
                   'artist_tag',
                   ])
               ->get($id);
               
     $images = ArtistBlog::where('id', $id)
               ->select([
                   'artist_image_path',
                   ])
               ->get($id);
            //   dd($images);                
    return view('member.artistImage', ['artist' => $artist, 'images' => $images]);
  }
    
}
