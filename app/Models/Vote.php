<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //    use HasFactory;

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'v_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'v_product_id');
    }

}
