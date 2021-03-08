<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

//    public $fillable = [];
    public $guarded = [];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
