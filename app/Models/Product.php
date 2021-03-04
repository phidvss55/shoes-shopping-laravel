<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

//    public $fillable = [];
    public $guarded = [];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
