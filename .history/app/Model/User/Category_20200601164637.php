<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Post;
class Category extends Model
{
    protected $guarded =[];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'category_posts')->paginate(5);
    }
    public function getRouteKeyName(){
        return 'slug';
       }
}
