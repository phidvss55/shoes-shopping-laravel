<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [''];

    public function products()
    {
        return $this->hasMany(Product::class, 'pro_category_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'c_parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'c_parent_id');
//        return $this->hasMany(Category::class, 'id');
    }
}
