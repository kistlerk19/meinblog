<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";

    protected $fillable = [
        "id",
        "url",
        "is_trending",
        "author",
        "author_image_url",
        "image_url_portrait",
        "image_url_landscape",
        "title",
        "date",
        "description",
        "content",
    ];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
