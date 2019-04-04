<?php

namespace App\Lib;

use Goutte\Client as GoutteClient;

/**
 * Class Scraper
 *
 * handles and process scraping using specific link
 * first we work on the main filter expression which is the
 * the container of the items, then using annonymous callback
 * on the filter function we iterate and save the results
 * into the article table
 *
 * @package App\Lib
 */
class Scraper
{
    protected $client;

    public function __construct(GoutteClient $client)
    {
        $this->client = $client;
    }

    public function handle($linkObj)
    {
        $crawler = $this->client->request('GET', $linkObj->url);

        // filter
        $crawler->filter($linkObj->main_filter_selector)->each(function ($node) {

            // using the $node var we can access sub elements deep the tree

        });
    }



    protected function translateCSSExpression($expression)
    {
        $exprArray = explode("||", $expression);

        // try to match split that expression into pieces
        $regex = '/(.*?)\[(.*)\]/m';

        $fields = [];

        foreach ($exprArray as $subExpr) {

            preg_match_all($regex, $subExpr, $matches, PREG_SET_ORDER, 0);

            // if this condition meets then this is attribute like img[src] or a[href]
            if(strpos($matches[2], "[") !== false && strpos($matches[2], "]") !== false) {


            }
        }
    }
}