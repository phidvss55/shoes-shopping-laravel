<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //    use HasFactory;
 
    protected $table = 'comments';

    protected $guarded = [''];

    public function user() 
    {
        return $this->belongsTo(User::class, 'c_user_id');
    }
}