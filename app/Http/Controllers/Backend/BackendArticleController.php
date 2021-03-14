<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendArticleController extends Controller
{
    protected $folder = 'backend.article';

    public function index()
    {
        $articles = Article::with('menu:id,mn_name')->orderByDesc('id')->paginate(10);
        $viewData = [
            'articles' => $articles,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function create()
    {
        $menus    = Menu::select('id', 'mn_name')->get();
        $viewData = [
            'menus' => $menus,
        ];

        return view($this->folder . '.create', $viewData);
    }

    public function store(BackendArticleRequest $request)
    {
        $requestDatas = $request->except('_token');
        $requestDatas['a_slug']     = Str::slug($requestDatas['a_name']);
        $requestDatas['created_at'] = Carbon::now();
        $requestDatas = call_upload_image($requestDatas, 'a_avatar');

        $article                    = Article::Create($requestDatas);
        if ( ! $article) {
            throw new \Exception('Create article is not success.');
        }

        return redirect()->route('get_backend.article.index');
    }

    public function edit($id)
    {
        if ( ! isset($id)) {
            throw new \Exception('Invalid ID');
        }
        $article = Article::find($id);
        $menus   = Menu::select('id', 'mn_name')->get();

        $viewData = [
            'article' => $article,
            'menus'   => $menus,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendArticleRequest $request, $id)
    {
        $requestDatas = $request->all();
        $article = Article::find($id);

        $requestDatas['a_slug']   = Str::slug($requestDatas['a_slug']);
        $requestDatas['updated_at'] = Carbon::now();

        $requestDatas = call_upload_image($requestDatas, 'a_avatar');

        $article->update($requestDatas);
        if ( ! $article) {
            throw new \Exception('Update product is not success.');
        }

        return redirect()->route('get_backend.article.index');
    }

    public function delete($id)
    {
        if ( ! isset($id)) {
            throw new \Exception('Invalid ID');
        }
        $article = Article::find($id);
        if ($article->delete()) {
            return redirect()->back();
        }
        throw new \Exception('Invalid article');
    }
}
