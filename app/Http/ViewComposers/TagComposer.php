<?php


namespace App\Http\ViewComposers;


use App\Services\TagService;
use Illuminate\View\View;

class TagComposer
{

    private TagService $tagService;

    /**
     * TagComposer constructor.
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function compose(View $view)
    {
        return $view->with('tagsCloud', $this->tagService->getTagsCloud());
    }
}
