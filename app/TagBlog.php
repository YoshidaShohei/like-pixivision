<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagBlog extends Model
{
    protected $guarded = array('id');
    
    public function images() 
    {
        return $this->hasMany('App\TagBlogImage', 'tag_blog_id');
    }


}
