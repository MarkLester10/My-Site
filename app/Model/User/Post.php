<?php

namespace App\Model\User;

use Carbon\Carbon;
use App\Model\User\Tag;
use App\Model\User\Like;
use App\Model\Admin\Admin;
use App\Model\User\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags')
            ->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_posts')
            ->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getSlugAttribute($value)
    {
        return route('post', $value);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function owner()
    {
        return Admin::where('id', $this->admin_id)->first()->name;
    }
}