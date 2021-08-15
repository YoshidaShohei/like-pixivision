<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TagBlog;
use App\TagBlogImage;
use Strage;
//画像リサイズ
use InterventionImage;

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
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['tag_image_path']);
        // データベースに保存する
        // $tag_blog->fill($tag_path);
        $tag_blog->save();
        $tag_blog_id = $tag_blog->id;
        // dd($tag_blog_id);
        // dd($form);
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        // if (isset($request->file('tag_image_path'))) {
            if ($request->hasfile('tag_image_path')){
                $sort_number = 1;
                $tag_blog_image = new TagBlogImage;
                // dd($request->file('tag_image_path'));
                foreach ($request->file('tag_image_path') as $file) {
                    $tag_path = $file->store('public/images');
                    $tag_blog_image->tag_image_path = basename($tag_path);
                    $tag_blog_image->sort_number = $sort_number;
                    $tag_blog_image->tag_blogs_id = $tag_blog_id;
                    $tag_blog_image->save();
                    $sort_number ++;
                }
            // }
            // // $tag_path = $request->file('tag_image_path')->store('public/images');
            // $tag_path = $request->file('tag_image_path')->storeAs('images', $tag_blog);
            // $tag_blog->tag_image_path = basename($tag_path);
        } else {
            $tag_blog->tag_image_path = null;
        }
        
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