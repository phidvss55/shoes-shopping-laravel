<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BlogBaseController;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends BlogBaseController
{
    public function index(Request $request, $slug)
    {
        $menu = Menu::where('mn_slug', $slug)->first();
        if (!$menu) {
            return abort(404);
        }
        $articles = Article::with('menu:id,mn_name,mn_slug')
            ->where('a_menu_id', $menu->id)
            ->orderByDesc('id')
            ->paginate(10);
        $viewData = [
            'articles' => $articles,
            'menu'     => $menu,
            'menus'    => $this->getMenus(),
            'articlesLatest'  => $this->getArticleLatest(),
            'tags'     => $this->getTags(),
        ];

        return view('frontend.menu.index', $viewData);
    }
}
