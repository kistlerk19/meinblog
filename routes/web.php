<?php

use App\Http\Controllers\HomeController;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::middleware(["web"])->group(function ()
{ 
    Route::get("/", [HomeController::class, "home"]);
    // Route::get('/', function () {
    //     return view('home', [
    //         "title" => "Mein CyberBlog",
    //         "page_length" => 12,
    //         "total_posts" => 15,
    //         "page_number" => 1,
    
    //         "posts" => [
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //         ],
    //         "trending" => [
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //         ],
    //         "recents" => [
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "is_trending" => true,
    //                 "author" => "Kistler Gyamfi",
    //                 "author_image_url" => "https://avatars.githubusercontent.com/u/63625414?s=96&v=4",
    //                 "image_url_portrait" => "https://picsum.photos/300/350",
    //                 "image_url_landscape" => "https://picsum.photos/360/160",
    //                 "title" => "Mein kleines CyberBlog",
    //                 "date" => "November 11, 1911",
    //                 "description" => "Cybersicherheit wird immer wichtiger, da wir uns mehr und mehr auf Technologie verlassen. Erfahren Sie, wie Sie wie Sie Ihr Netzwerk und Ihre Daten mit Themen wie VPNs, Sicherheitssoftware und Netzwerksicherheit schützen können.",
    //                 "tags" => "tag1,tag2,tag3",
    //             ],
    //         ],
    //         'tags' => [
    //             [
    //                 "url" => "/",
    //                 "name" => "VPN",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "name" => "Docker",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "name" => "Active Directory",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "name" => "AWS",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "name" => "Laravel",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "name" => "SQL",
    //             ],
    //             [
    //                 "url" => "/",
    //                 "name" => "PHP",
    //             ],
    //         ],
    //     ]);
    // });
});


