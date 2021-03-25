<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseFrontendController;
use App\Models\Category;

class ProductBaseController extends BaseFrontendController
{
    public function getCategoriesSort() {
        return Category::with('children:id,c_name,c_slug,c_parent_id')
                       ->where('c_parent_id', config('constant.parent_id'))
                       ->get();
    }
}
