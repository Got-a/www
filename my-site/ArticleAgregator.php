<?php

include_once 'Article.php';
/**
 * Class ArticleAgregator
 */
class ArticleAgregator
{
    /**
     * Article collection
     * @var ArrayObject
     */
    private $oArticleCollection;

    /**
     * ArticleAgregator constructor.
     */
    public function __construct()
    {
        $this->oArticleCollection = new ArrayObject();
    }

    /**
     * append article from different source
     * @param interface ArticleInterface
     * @throws Exception
     */
    public function append($oSource)
    {
        if (true === empty($oSource)) {
            throw new Exception('source is empty');
        }

        foreach ($oSource->getArticles() as $aArticle)
        {
            $oArticle = new Article();
            $this->oArticleCollection->append(
                $oArticle
                    ->setSourceName($aArticle['sSourceName'])
                    ->setArticleName($aArticle['aArticleName'])
                    ->setArticleContent($aArticle['aArticleContent'])
            );
        }
    }

    /**
     * Return article list
     * @return ArrayObject
     */
    public function getArticles()
    {
        return $this->oArticleCollection;
    }
}