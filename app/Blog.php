<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = array('id');

    // // 以下を追記
    // public static $rules = array(
    //     'title' => 'required',
    //     'tag' => 'required',
    //     );
    
    public function images() {
        return $this->hasMany('App\TagBlogImage', 'tag_blog_id');
        
    }
    
}
