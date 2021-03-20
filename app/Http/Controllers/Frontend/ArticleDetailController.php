<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BlogBaseController;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleDetailController extends BlogBaseController
{
    public function index($slug, Request $request)
    {
        $article = Article::where('a_slug', $slug)->first();
        if ( ! $article) {
            return abort(404);
        }
        $viewData = [
            'article'        => $article,
            'tags'           => $this->getTags(),
            'articlesLatest' => $this->getArticleLatest(),
            'menus'          => $this->getMenus(),
        ];

        return view('frontend.article_detail.index', $viewData);
    }
}
