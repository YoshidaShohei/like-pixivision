<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{
    public function add() 
    {
        return view('admin.blog.create');
    }
    
    public function create(Request $request)
    {
    // 以下を追記
    // Varidationを行う
    $this->validate($request, Blog::$rules);
    
    $blog = new Blog;
    $form = $request->all();
    
    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    if (isset($form['image'])) {
        $path = $request->file('image')->store('public/images');
        $blog->image_path = basename($path);
    } else {
        $blog->image_path = null;
    }
    
    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['image']);
    // データベースに保存する
    $blog->fill($form);
    $blog->save();
    return redirect('admin/blog/create');
    }
    
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
        return view('admin/blog/index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }    
    
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $blog = Blog::find($request->id);
      if (empty($blog)) {
        abort(404);    
      }
      return view('admin.blog.edit', ['blog_form' => $blog]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Blog::$rules);
      // News Modelからデータを取得する
      $blog = Blog::find($request->id);
      // 送信されてきたフォームデータを格納する
      $blog_form = $request->all();
      
      if ($request->remove == 'true') {
          $blog_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/images');
          $blog_form['image_path'] = basename($path);
      } else {
          $blog_form['image_path'] = $blog->image_path;
      }

      unset($blog_form['image']);
      unset($blog_form['remove']);
      unset($blog_form['_token']);

      // 該当するデータを上書きして保存する
      $blog->fill($blog_form)->save();

      return redirect('/');
  }    
  
   public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $blog = Blog::find($request->id);
      // 削除する
      $blog->delete();
      return redirect('/');
  }  
  
}