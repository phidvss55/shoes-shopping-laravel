<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends Model
{
    use SoftDeletes;
//    use HasFactory;
    protected $table = 'articles_tags';

//    protected $fillable = [''];
    protected $guarded = [''];
}
