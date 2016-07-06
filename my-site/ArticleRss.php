<?php

include_once 'ArticleInterface.php';

/**
 * Class ArticleRss
 */
class ArticleRss implements ArticleInterface
{
    /**
     * Rss url
     * @var $sUrl
     */
    private $sUrl;

    /**
     * Rss source
     * @var $sSource
     */
    private $sSource;

    /**
     * Articles list
     * @var array
     */
    private $aArticles = array();

    /**
     * Set rss url
     * @param $sUrl
     * @return $this
     */
    public function setUrl($sUrl)
    {
        $this->sUrl = $sUrl;

        return $this;
    }

    /**
     * set rss source
     * @param $sSource
     * @return $this
     */
    public function setSource($sSource)
    {
        $this->sSource = $sSource;

        return $this;
    }

    /**
     *  Load articles list from rss url
     */
    private function loadArticles()
    {
        $sXml = file_get_contents($this->sUrl, false);
        $oXml = new SimpleXMLElement($sXml);
        foreach ($oXml->children() as $oFirstChild) {
            foreach ($oFirstChild->children() as $sParent => $oSecondChild) {
                if ($sParent === 'item') {

                    $this->aArticles[] = array(
                        'sSourceName'       => $this->sSource,
                        'aArticleName'      => $oSecondChild->title,
                        'aArticleContent'   => $oSecondChild->description
                    );
                }
            }
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
}