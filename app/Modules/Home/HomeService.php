<?php

declare (strict_types = 1);

namespace App\Modules\Home;

use App\Modules\Post\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class HomeService
{
    const PAGE_LENGTH = 10;

    public function __construct(
        private readonly PostService $postService,
    )
    {
        # code...
    }

    public function home(Request $request): array
    {
        $totalPosts = $this->postService->getTotalPosts();
        $page = $this->getPageNumber($request, $totalPosts);
        return [
            "title" => "Mein CyberBlog",
            "page_length" => self::PAGE_LENGTH,
            "total_posts" => $totalPosts,
            "page_number" => $page,

            "posts" => $this->postService->UIList($page, self::PAGE_LENGTH),
            "trending" => $this->postService->UIList(
                $page,
                self::PAGE_LENGTH,
                [ "is_trending" => 1 ]
            ),
            "recents" => $this->postService->UIListRecent(),
            'tags' => [
                [
                    "url" => "/",
                    "name" => "VPN",
                ],
                [
                    "url" => "/",
                    "name" => "Docker",
                ],
                [
                    "url" => "/",
                    "name" => "Active Directory",
                ],
                [
                    "url" => "/",
                    "name" => "AWS",
                ],
                [
                    "url" => "/",
                    "name" => "Laravel",
                ],
                [
                    "url" => "/",
                    "name" => "SQL",
                ],
                [
                    "url" => "/",
                    "name" => "PHP",
                ],
            ],
        ];
    }

    private function getPageNumber(Request $request, int $totalPosts): int
    {
        $maxPageNumber = ceil($totalPosts / self::PAGE_LENGTH);
        $page = $request->query("page", 1);
        // $posts = $this->postService->UIList($page, self::PAGE_LENGTH);

        try {
            $request->validate(
                [ "page" => "numeric|min:1|max:$maxPageNumber" ],
                [ "page" => $page ]
            );
        } catch (ValidationException $error) {
            Log::error($error->getMessage());
            abort(404);
        }

        return (int)$page;
    }
}
