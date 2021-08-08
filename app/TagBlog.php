<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagBlog extends Model
{
    protected $guarded = array('id');
    
    public function image() 
    {
        return $this->hasMany('App\TagBlogImage');
    }


}
