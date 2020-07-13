<?php

namespace App\Blog;

use Spatie\ViewModels\ViewModel;

class PostsViewModel extends ViewModel
{
    public $posts;
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function slugName()
    {
        return collect($this->posts)->map(function ($post) {
            $formatedSlug = substr($post->slug, strrpos($post->slug, '/') + 1);

            return collect($post->slug)->merge([
                'name' => $formatedSlug,
            ]);
        });
    }
}
