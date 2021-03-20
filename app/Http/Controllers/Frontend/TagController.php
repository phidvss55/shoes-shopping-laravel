<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BlogBaseController
{
    public function index(Request $request, $slug)
    {
        $tag = Tag::where('t_slug', $slug)->first();
        if ( ! $tag) {
            return abort(404);
        }
        $articles = Article::with('menu:id,mn_name,mn_slug')
                           ->whereHas('tags', function ($query) use ($tag) {
                               $query->where('at_tag_id', $tag->id);
                           })
                           ->orderByDesc('id')
                           ->paginate(10);
        $viewData = [
            'tag'            => $tag,
            'articles'       => $articles,
            'tags'           => $this->getTags(),
            'articlesLatest' => $this->getArticleLatest(),
            'menus'          => $this->getMenus(),
        ];

        return view('frontend.menu.index', $viewData);
    }
}
