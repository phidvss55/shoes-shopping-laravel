<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BlogBaseController;

class ArticleDetailController extends BlogBaseController
{
    public function index()
    {
        return view('frontend.article_detail.index');
    }
}
