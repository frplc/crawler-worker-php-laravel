<?php
declare(strict_types=1);
/**
 * Date: 12.02.21
 * Time: 23:24
 */
namespace App\Console\Commands;

use App\Services\CrawlerWorker\Interfaces\CrawlerWorker;

class CrawlerWorkerFactory
{
    /**
     * @param string $crawlerType
     * @return CrawlerWorker
     */
    public static function makeCrawler(string $crawlerType): CrawlerWorker
    {
        switch ($crawlerType) {
            case "PLAIN_DOWNLOADER":
                $crawler = app()->make('PlainDownloaderCrawler');
                break;
            case "BROWSER_DRIVER_PERFORMER":
                $crawler = app()->make('BrowserDriverPerformerCrawler');
                break;
            default:
                throw new \InvalidArgumentException("Unknown crawler type");
        }
        return $crawler;
    }

}
