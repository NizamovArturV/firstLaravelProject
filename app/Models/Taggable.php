<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

abstract class Taggable extends Model
{
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, $this->getBoundsTableTags());
    }

    abstract protected function getBoundsTableTags(): string;
}
