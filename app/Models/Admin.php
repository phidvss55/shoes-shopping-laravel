<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
//    use HasFactory, SoftDelete;
    protected $table = 'admins';

//    protected $fillable = [''];
    protected $guarded = [''];
}
