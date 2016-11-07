<?php

namespace App\Services;

use Goutte\Client;

/**
 * Class Crawler
 * @package App\Service
 */
class CrawlerService
{
    /** @var Client */
    protected $client;

    /** @var Symfony\Component\DomCrawler\Crawler */
    protected $crawler = null;

    /**
     * @param Client Client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     */
    public function getUrl($url)
    {
        // TODO::Cacheがあったらアクセスに行かない
        $this->crawler = $this->client->request('GET', $url);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->crawler->filter('head > title')->text();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->crawler->filterXpath('//meta[@property="og:description"]')->attr('content');
    }
}
