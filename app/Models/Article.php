<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
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
}
