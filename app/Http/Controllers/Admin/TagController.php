<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TagBlog;

class TagController extends Controller
{
    public function add() 
    {
        return view('admin.blog.tagCreate');
    }

    public function create(Request $request)
    {
    // 以下を追記
    // Varidationを行う
    // $this->validate($request, Blog::$rules);
    
    $tag_blog = new TagBlog;
    $form = $request->all();
    // dd($form);
    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    if (isset($form['tag_image_path'])) {
        {
        // if (is_array($form['tag_image_path'])){
            $sort_number = 1;
            // dd($form['tag_image_path']);
            foreach ($form['tag_image_path'] as $image_path) {
                $tag_path = $request->file('tag_image_path')->store('public/images');
                $tag_blog->tag_image_path = basename($tag_path);
                $sort_number ++;
            }
        }
        // // $tag_path = $request->file('tag_image_path')->store('public/images');
        // $tag_path = $request->file('tag_image_path')->storeAs('images', $tag_blog);
        // $tag_blog->tag_image_path = basename($tag_path);
    } else {
        $tag_blog->tag_image_path = null;
    }
    
    
    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['tag_image_path']);
    // データベースに保存する
    $tag_blog->fill($tag_path);
    $tag_blog->save();
    return redirect('admin/blog/tag/create');
    }
    
    public function index(Request $Request) {
        $tags_posts = DB::table('tagBlogs')->select('tag_title', 'tag_tag', 'tag_image_path')->get();
            return view('member.index', ['tags_posts' => $tags_posts]);
    }
    
  public function image($id) 
    {
     $tag = TagBlog::where('id', $id)
       ->select([
           'tag_title',
           'tag_tag',
           ])
       ->first($id);
               
     $images = TagBlog::where('id', $id)
       ->select([
           'tag_image_path',
           ])
       ->get($id);
    //   dd($images);  
               
      return view('member.tagImage', ['tag' => $tag, 'images' => $images]);
    }
  
}