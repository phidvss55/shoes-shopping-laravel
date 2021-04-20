<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = [''];
    public $timestamps = true;

    public function articles() {
        return $this->belongsToMany(Article::class, 'articles_tags', 'at_article_id', 'at_tag_id');
    }
}
