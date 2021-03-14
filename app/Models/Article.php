<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    //    use HasFactory;
    protected $table = 'articles';

//    protected $fillable = [''];
    protected $guarded = [''];

    public function menu() {
        return $this->belongsTo(Menu::class, 'a_menu_id');
    }
}
