<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagBlogImage extends Model
{
        public function image() 
    {
        return $this->belongsTo('App\TagBlog');
    }
}
