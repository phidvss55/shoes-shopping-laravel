<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendKeywordRequest;
use App\Models\Keyword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendKeywordController extends Controller
{
    protected $folder = 'backend.keyword';

    public function index()
    {
        $keywords = Keyword::orderByDesc('id')->get();
        $keyword  = new Keyword();
        $viewData = [
            'keywords' => $keywords,
            'keyword'  => $keyword,
        ];

        return view($this->folder . '.index', $viewData);
    }

    public function store(BackendKeywordRequest $request)
    {
        $requestDatas = $request->except('_token');

        $requestDatas['k_slug']     = Str::slug($requestDatas['k_name']);
        $requestDatas['created_at'] = Carbon::now();
        $keywords                   = Keyword::Create($requestDatas);
        if ( ! $keywords) {
            throw new \Exception('Create keyword is not success.');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $keywords = Keyword::orderByDesc('id')->get();
        $keyword  = Keyword::find($id);
        $viewData = [
            'keywords' => $keywords,
            'keyword'  => $keyword,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(BackendKeywordRequest $request, $id)
    {
        $data               = $request->except('_token');
        $data['k_slug']     = Str::slug($data['k_name']);
        $data['updated_at'] = Carbon::now();
        $keyword            = Keyword::find($id);
        if ($keyword) {
            $keyword->update($data);

            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $keyword = Keyword::find($id);
        if ($keyword) {
            $keyword->delete();
            return redirect()->back();
        } else {
            throw new \Exception('Delete fail');
        }
    }
}
