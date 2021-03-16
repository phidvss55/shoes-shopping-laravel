<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BlogBaseController;
use App\Models\Article;

class ArticleController extends BlogBaseController
{
    public function index()
    {
        $articles = Article::with('menu:id,mn_name,mn_slug')->orderByDesc('id')->paginate(10);
        $viewData = [
            'articles'  => $articles,
            'tags'      => $this->getTags(),
            'articlesLatest'  => $this->getArticleLatest(),
            'menus'     => $this->getMenus(),
        ];
        return view('frontend.menu.index', $viewData);
    }
}
