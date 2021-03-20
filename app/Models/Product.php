<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    public $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }
}
