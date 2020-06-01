<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Post;
class Category extends Model
{
    protected $guarded =[];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'category_posts')->where('status','1')->orderBy('created_at','DESC')->paginate(5);
    }
    public function getRouteKeyName(){
        return 'slug';
       }
}
