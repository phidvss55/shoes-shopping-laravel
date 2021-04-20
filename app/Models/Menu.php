<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $guarded = [''];

    public function articles() {
        return $this->hasMany(Article::class, 'a_menu_id');
    }
}
