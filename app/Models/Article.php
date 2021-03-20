<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'articles';
    protected $guarded = [''];

    public function menu() {
        return $this->belongsTo(Menu::class, 'a_menu_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'articles_tags', 'at_article_id', 'at_tag_id');
    }
}
