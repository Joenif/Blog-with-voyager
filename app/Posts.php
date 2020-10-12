<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Post;

class Posts extends Post
{
    const PUBLISHED = 'PUBLISHED';

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');   
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }

}
