<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @param ArticleService $articleService
     * @return Application|Factory|View
     */
    public function index(ArticleService $articleService)
    {
        return view('articles.index')->with('articles',  $articleService->getArticles());
    }

    /**
     * @param Article $article
     * @return Application|Factory|View
     */
    public function show(Article $article)
    {
        return view('articles.detail')->with('article', $article);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * @param UpdateArticleRequest $request
     * @param ArticleService $articleService
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(UpdateArticleRequest $request, ArticleService $articleService, Article $article)
    {
        if (!$articleService->update($article, $request->getDto())) {
            return redirect()->back()->withErrors('Не удалось изменить статью, попробуйте позже');
        }

        return redirect()->route('articles.show', $article)->with('success', 'Статья успешно изменена');
    }

    /**
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        return view('articles.edit')->with('article', $article);
    }

    /**
     * @param Article $article
     * @param ArticleService $articleService
     * @return RedirectResponse
     */
    public function destroy(Article $article, ArticleService $articleService)
    {
        if (!$articleService->delete($article)) {
            return redirect()->back()->withErrors('Не удалось удалить статью, попробуйте позже');
        }

        return redirect()->route('mainPage')->with('success', 'Статья успешно удалена');
    }

    /**
     * @param StoreArticleRequest $request
     * @param ArticleService $articleService
     * @return RedirectResponse
     */
    public function store(StoreArticleRequest $request, ArticleService $articleService)
    {
        if (!$articleService->create($request->getDto())) {
            return redirect()->back()->withErrors('Не удалось создать статью, попробуйте позже');
        }

        return redirect()->route('mainPage')->with('success', 'Статья успешно создана');
    }
}
