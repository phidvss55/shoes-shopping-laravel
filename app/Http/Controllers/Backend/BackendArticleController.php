<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendArticleRequest;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $tags     = Tag::all();
        $viewData = [
            'menus'   => $menus,
            'tags'    => $tags,
            'tagsOld' => [],
        ];

        return view($this->folder . '.create', $viewData);
    }

    public function store(BackendArticleRequest $request)
    {
        try {
            DB::beginTransaction();
            $requestDatas               = $request->except('_token');
            $requestDatas['a_slug']     = Str::slug($requestDatas['a_name']);
            $requestDatas['updated_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 'a_avatar');
            $article = Article::create($requestDatas);
            $article->tags()->attach($requestDatas['tags']);
            if ( ! $article) {
                throw new \Exception('Update product is not success.');
            }
            DB::commit();
            return redirect()->route('get_backend.article.index');
        } catch (\Exception $exception) {
            Log::info('[Exception] ' . $exception->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ( ! isset($id)) {
            throw new \Exception('Invalid ID');
        }
        $article = Article::find($id);
        $menus   = Menu::select('id', 'mn_name')->get();
        $tags    = Tag::all();
        $tagsOld = $article->tags()->pluck('at_tag_id')->toArray() ?? [];

        $viewData = [
            'article' => $article,
            'menus'   => $menus,
            'tags'    => $tags,
            'tagsOld' => $tagsOld,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendArticleRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $requestDatas               = $request->except('_token');
            $article                    = Article::find($id);
            $requestDatas['a_slug']     = Str::slug($requestDatas['a_name']);
            $requestDatas['updated_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 'a_avatar');
            $article->update($requestDatas);
            $article->tags()->sync($requestDatas['tags']);
            if ( ! $article) {
                throw new \Exception('Update product is not success.');
            }
            DB::commit();
            return redirect()->route('get_backend.article.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }
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
