<?php

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/DB/Db.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'it-blog.ru');

$url = 'https://it-blog.ru/page/1/';

$db = new Db(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


function getArticleData($url)
{
    /** Singleton */
    static $dom;
    if (is_null($dom)) {
        $dom = new PHPHtmlParser\Dom;
    }

    $html = $dom->loadFromFile($url);

    /** @var PHPHtmlParser\Dom\Node\HtmlNode $h1 */
    $h1 = $html->find('h1.card-title', 0);
    $h1InnerText = $h1->innerText();

    /** @var PHPHtmlParser\Dom\Node\HtmlNode $content */
    $content = $html->find('article', 0);
    $contentInnerText = $content->innerText();

    return [
        'h1' => $h1InnerText,
        'content' => $contentInnerText,
    ];
}

function getArticlesLinkFromCatalog(string $url)
{

    echo PHP_EOL . PHP_EOL . $url . PHP_EOL . PHP_EOL;

    global $db;

    /** Singleton */
    static $dom;
    if (is_null($dom)) {
        $dom = new PHPHtmlParser\Dom;
    }

    $html = $dom->loadFromFile($url);

    /** @var PHPHtmlParser\Dom\Node\Collection $articlesLink */
    $articlesLink = $html->find('a.shadow-none');

    /** @var PHPHtmlParser\Dom\Node\HtmlNode $articleLink */
    foreach ($articlesLink as $articleLink) {
        echo $articleLink->getAttribute('href') . PHP_EOL;

        $articleLink = $db->escape($articleLink->getAttribute('href'));
        $sql = "
            INSERT IGNORE INTO articles 
            SET url = '{$articleLink}'
        ";
        $db->query($sql);
    }

    /** @var PHPHtmlParser\Dom\Node\HtmlNode $nextLink */
    if ($nextLink = $html->find('a.next', 0)) {
        getArticlesLinkFromCatalog($nextLink->getAttribute('href'));
    }
}

getArticlesLinkFromCatalog($url);