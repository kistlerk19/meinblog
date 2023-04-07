<?php

declare (strict_types = 1);

namespace App\Modules\Post;

/**
 * Summary of PostService
 */
class PostService
{
    public function __construct(
        private readonly PostRepository $postRepository,
    )
    {
        
    }

    public function getTotalPosts(): int
    {
        return $this->postRepository->getTotalPosts();
    }
    /**
     * Summary of UIList
     * @param int $page
     * @param int $pageLength
     * @return array
     */
    public function UIList(int $page, int $pageLength, array $filters = []): array
    {
        return $this->postRepository->UIList($page, $pageLength, $filters);
    }
    public function UIListRecent(): array
    {
        return $this->postRepository->UIListRecent();
    }
}