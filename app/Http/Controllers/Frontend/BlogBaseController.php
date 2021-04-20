<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Tag;

class BlogBaseController extends Controller
{
    public function getMenus() {
        return Menu::withCount('articles')->orderByDesc('id')->get();
    }

    public function getArticleLatest() {
        return Article::orderByDesc('id')->limit(4)->select('id', 'a_name', 'a_slug', 'a_avatar')->get();
    }

    public function getTags() {
        return Tag::orderByDesc('id')->get();
    }
}
