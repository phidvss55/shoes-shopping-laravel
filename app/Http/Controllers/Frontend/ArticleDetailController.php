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
        $articleNext = Article::where('id', '<', $article->id)->limit(1)->orderBy('id', 'desc')->first();
        $articlePrev = Article::where('id', '>', $article->id)->limit(1)->orderBy('id', 'asc')->first();
        $viewData = [
            'article'        => $article,
            'articleNext'    => $articleNext,
            'articlePrev'    => $articlePrev,
            'tags'           => $this->getTags(),
            'articlesLatest' => $this->getArticleLatest(),
            'menus'          => $this->getMenus(),
        ];

        return view('frontend.article_detail.index', $viewData);
    }
}
