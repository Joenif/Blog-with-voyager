<?php

namespace App;

use App\Posts;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{
    public function posts()
    {
        return $this->hasMany(Posts::class)
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeHasChild($query, $id)
    {
        $child = $query->where('parent_id', $id);
        if($child->exists()) {
            return true;
        }
        return false;
    }
    public function categoryPosts() {

        $allPosts = collect(([]));
        $allCategoryPosts = $this->posts;
        $allPosts= $allPosts->concat($allCategoryPosts);

        if ($this->children->isNotEmpty()) {
            foreach($this->children as $child) {
                $allPosts = $allPosts->concat($child->posts);
            }
        }
        return $allPosts;

    }
}
