<?php


namespace App\Services;


use App\Dto\TagDto;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Support\Collection;

final class TagService
{
    public function findOrCreate(TagDto $tagDto)
    {
        return Tag::firstOrCreate(['name' => $tagDto->getName()]);
    }

    public function sync(Collection $tags, Taggable $model): bool
    {
        $syncIds = [];
        foreach ($tags as $tagName) {

            $tagDto = new TagDto($tagName);

            $tag = $this->findOrCreate($tagDto);

            if ($tag) {
                $syncIds[] = $tag->id;
            }
        }

        if ($syncIds) {
            $model->tags()->sync($syncIds);
        }

        return true;
    }


    public function getTagsCloud()
    {
        return Tag::has('articles')->orderBy('name', 'asc')->get();
    }
}
