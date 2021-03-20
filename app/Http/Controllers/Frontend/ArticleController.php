<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BlogBaseController;
use App\Models\Article;
use PhpParser\Error;
use Symfony\Component\Process\ExecutableFinder;

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

    public function updateView($id) {
        try {
            $article = Article::find($id);
            if($article) {
                $article->a_view = $article->a_view + 1;
                $article->save();
                return redirect()->back();
            }
//            throw new \Exception('There are something wrong here');
            return redirect()->back();
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
