<?php

/**
 * Class Article
 */
class Article {

    /**
     * Article name
     * @var $sArticleName
     */
    private $sArticleName;

    /**
     * Article content
     * @var $sArticleContent
     */
    private $sArticleContent;

    /**
     * Source name
     * @var $sSourceName
     */
    private $sSourceName;

    /**
     * Get article name
     * @return string
     */
    public function getArticleName()
    {
        return $this->sArticleName;
    }

    /**
     * Get article content
     * @return string
     */
    public function getArticleContent()
    {
        return $this->sArticleContent;
    }

    /**
     * Get source name
     * @return string
     */
    public function getSourceName()
    {
        return $this->sSourceName;
    }

    /**
     * Set source name
     * @param $sSourceName
     * @return $this
     */
    public function setSourceName($sSourceName)
    {
        $this->sSourceName = $sSourceName;

        return $this;
    }

    /**
     * Set article name
     * @param $sArticleName
     * @return $this
     */
    public function setArticleName($sArticleName)
    {
        $this->sArticleName = $sArticleName;

        return $this;
    }

    /**
     * Set article Content
     * @param $sArticleContent
     * @return $this
     */
    public function setArticleContent($sArticleContent)
    {
        $this->sArticleContent = $sArticleContent;

        return $this;
    }
}