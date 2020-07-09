<?php

namespace App\Model\User;

use App\Model\User\Post;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class,'likes');
    }
}
