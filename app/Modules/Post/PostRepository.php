<?php

declare (strict_types = 1);

namespace App\Modules\Post;

use App\Models\Post;

class PostRepository
{
    const RECENT_POST_LIMIT = 5;

    public function getTotalPosts(): int
    {
        return Post::all()->count();
    }

    
    public function UIList(int $page, int $pageLength, array $filters = []): array
    {
        if ($filters !== []) {
            return Post::with(["tags"])
                ->where($filters)
                ->limit($pageLength)
                ->offset(($page - 1) * $pageLength)
                ->get()
                ->toArray();
        }

        return Post::with(["tags"])
            ->where("id", ">", 0)
            ->limit($pageLength)
            ->offset(($page - 1) * $pageLength)
            ->get()
            ->toArray();
    }
    public function UIListRecent(): array
    {
        return Post::with(["tags"])
            ->where("id", ">", 0)
            ->limit(self::RECENT_POST_LIMIT)
            ->orderBy("created_at", "desc")
            ->get()
            ->toArray();
    }
}
