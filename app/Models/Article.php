<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Taggable
{
    use HasFactory;

    public $guarded = [];

    protected $table = 'articles';

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    protected function getBoundsTableTags(): string
    {
        return 'article_tag';
    }
}
