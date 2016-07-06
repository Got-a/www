<?php

include_once 'ArticleInterface.php';

/**
 * Class ArticleDatabase
 */
class ArticleDatabase implements ArticleInterface
{
    /**
     * Database connection
     * @var $oDatabase
     */
    private $oDatabase;

    /**
     * Articles list
     * @var array
     */
    private $aArticles = array();

    /**
     * ArticleDatabase constructor.
     * @param $oDatabase
     */
    public function __construct($oDatabase)
    {
        $this->oDatabase = $oDatabase;
    }

    /**
     * Load articles list from database
     */
    private function loadArticles()
    {
        $oArticleResult = $this->getResult();
        while ($aArticle = $oArticleResult->fetch_assoc())
        {
            $this->aArticles[] = array(
                'sSourceName'       => $aArticle['sourceName'],
                'aArticleName'      => $aArticle['articleName'],
                'aArticleContent'   => $aArticle['articleContent']
            );
        }
    }

    /**
     * Return articles list
     * @return array
     */
    public function getArticles()
    {
        $this->loadArticles();

        return $this->aArticles;
    }

    /**
     * Load article from database
     * @return mysqli_result
     */
    private function getResult()
    {
        $sSql = "select s.name as sourceName,
                        a.name as articleName,
                        a.content as articleContent
                 from article a 
                 inner join source s on (s.id = a.source_id)";

        $oResult = $this->oDatabase->query($sSql);

        return $oResult;
    }
}