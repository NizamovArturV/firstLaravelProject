<?php


namespace App\Services;


use App\Dto\Article\ArticleDto;
use App\Models\Article;

final class ArticleService
{

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return Article::with('tags')->where('is_published', true)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param ArticleDto $articleDto
     * @return bool
     */
    public function create(ArticleDto $articleDto): bool
    {
        $article = new Article();

        $article = $this->prepareArticle($article, $articleDto);
        if (!$article->save()) {
            return false;
        }

        return true;
    }

    /**
     * @param Article $article
     * @param ArticleDto $articleDto
     * @return bool
     */
    public function update(Article $article, ArticleDto $articleDto): bool
    {
        $article = $this->prepareArticle($article, $articleDto);

        if (!$article->save()) {
            return false;
        }

        return true;
    }

    /**
     * @param Article $article
     * @return bool|null
     */
    public function delete(Article $article): ?bool
    {
        return $article->delete();
    }

    /**
     * @param Article $article
     * @param ArticleDto $articleDto
     * @return Article
     */
    private function prepareArticle(Article $article, ArticleDto $articleDto): Article
    {
        $article->title = $articleDto->getTitle();
        $article->code = $articleDto->getCode();
        $article->preview_text = $articleDto->getPreviewText();
        $article->detail_text = $articleDto->getDetailText();
        $article->is_published = $articleDto->isIsPublished();

        return $article;
    }
}
