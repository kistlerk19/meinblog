<?php

declare (strict_types = 1);

namespace App\Modules\Post;

use App\Models\Post;

class PostRepository
{

    public function getTotalPosts(): int
    {
        return Post::all()->count();
    }

    
    public function UIList(int $page, int $pageLength): array
    {
        return Post::with(["tags"])
            ->where("id", ">", 0)
            ->limit($pageLength)
            ->offset(($page - 1) * $pageLength)
            ->get()
            ->toArray();
    }
}
