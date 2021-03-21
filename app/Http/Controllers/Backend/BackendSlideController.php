<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BackendSlideController extends Controller
{
    protected $folder = 'backend.slide';

    public function index()
    {
        $slides = Slide::orderByDesc('id')->get();
        $slide   = new Slide();
        $viewData   = [
            'slides' => $slides,
            'slide'   => $slide,
        ];
        return view($this->folder . '.index', $viewData);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $requestDatas               = $request->except('_token');
            $requestDatas['created_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 's_banner');
            $slides                 = Slide::create($requestDatas);
            if ($slides) {
                DB::commit();
                return redirect()->back();
            }
            DB::rollBack();
            throw new \Exception('Create slide is not success.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $slides = Slide::orderByDesc('id')->get();
        $slide   = Slide::find($id);
        $viewData   = [
            'slides' => $slides,
            'slide'   => $slide,
        ];

        return view($this->folder . '.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $slide = Slide::find($id);
            if ( ! $slide) {
                throw new \Exception('There are something wrong here');
            }
            $requestDatas               = $request->except('_token');
            $requestDatas['updated_at'] = Carbon::now();
            $requestDatas               = call_upload_image($requestDatas, 's_banner');
            $slide->update($requestDatas);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        if ($slide) {
            $slide->delete();
            return redirect()->back();
        } else {
            throw new \Exception('Delete fail');
        }
    }
}
