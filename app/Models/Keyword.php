<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';
    protected $guarded = [''];

    public function products() {
        return $this->belongsToMany(Keyword::class, 'products_keywords', 'pk_product_id', 'pk_keyword_id');
    }
}
