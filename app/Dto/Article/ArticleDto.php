<?php


namespace App\Dto\Article;


use Illuminate\Support\Collection;

/**
 * Class ArticleDto
 * @package App\Dto\Article
 */
class ArticleDto
{

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $code;

    /**
     * @var string
     */
    private string $previewText;

    /**
     * @var string
     */
    private string $detailText;

    /**
     * @var bool
     */
    private bool $isPublished;

    private ?Collection $tags;

    /**
     * ArticleDto constructor.
     * @param string $title
     * @param string $code
     * @param string $previewText
     * @param string $detailText
     * @param bool $isPublished
     * @param Collection|null $tags
     */
    public function __construct(string $title, string $code, string $previewText, string $detailText, bool $isPublished = false, ?Collection $tags = null)
    {
        $this->title = $title;
        $this->code = $code;
        $this->previewText = $previewText;
        $this->detailText = $detailText;
        $this->isPublished = $isPublished;
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getPreviewText(): string
    {
        return $this->previewText;
    }

    /**
     * @return string
     */
    public function getDetailText(): string
    {
        return $this->detailText;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    public function getTags(): ?Collection
    {
        return $this->tags;
    }
}
