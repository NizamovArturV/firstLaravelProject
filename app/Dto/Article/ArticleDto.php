<?php


namespace App\Dto\Article;


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
    private string $preview_text;

    /**
     * @var string
     */
    private string $detail_text;

    /**
     * @var bool
     */
    private bool $is_published;

    /**
     * ArticleDto constructor.
     * @param string $title
     * @param string $code
     * @param string $preview_text
     * @param string $detail_text
     * @param bool $is_published
     */
    public function __construct(string $title, string $code, string $preview_text, string $detail_text, bool $is_published = false)
    {
        $this->title = $title;
        $this->code = $code;
        $this->preview_text = $preview_text;
        $this->detail_text = $detail_text;
        $this->is_published = $is_published;
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
        return $this->preview_text;
    }

    /**
     * @return string
     */
    public function getDetailText(): string
    {
        return $this->detail_text;
    }

    /**
     * @return bool
     */
    public function isIsPublished(): bool
    {
        return $this->is_published;
    }
}
