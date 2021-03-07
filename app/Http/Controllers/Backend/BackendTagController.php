<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendTagRequest;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendTagController extends Controller
{
    protected $folder = 'backend.tag';

    public function index()
    {
        $tags     = Tag::orderByDesc('id')->get();
        $viewData = [
            'tags' => $tags,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function store(BackendTagRequest $tagRequest)
    {
        $requestDatas = $tagRequest->except('_token');

        $requestDatas['t_slug']     = Str::slug($requestDatas['t_name']);
        $requestDatas['created_at'] = Carbon::now();
        $tag                        = Tag::Create($requestDatas);
        if ($tag) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $tags     = Tag::orderByDesc('id')->get();
        $tag      = Tag::find($id);
        $viewData = [
            'tags' => $tags,
            'tag'  => $tag,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendTagRequest $request, $id)
    {
        $data               = $request->except('_token');
        $data['t_slug']     = Str::slug($data['t_name']);
        $data['updated_at'] = Carbon::now();
        $tag                = Tag::find($id);
        if ($tag) {
            $tag->update($data);

            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();

            return redirect()->back();
        } else {
            throw new \Exception('Delete fail');
        }
    }
}
