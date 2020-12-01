<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historique extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'user_id','id');
    }
}
