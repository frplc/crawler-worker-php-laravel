<?php
declare(strict_types=1);
/**
 * Date: 13.02.21
 * Time: 22:55
 */
namespace App\Services\CrawlerWorker;

use App\Services\CrawlerWorker\Abstracts\BaseResponseHandler;
use App\Services\CrawlerWorker\Interfaces\CrawlerWorker;
use App\Services\CrawlerWorker\Interfaces\ResponseHandler;

class LinksDigger extends BaseResponseHandler implements ResponseHandler
{
    /**
     * LinksDigger constructor.
     * @param CrawlerWorker $crawler
     */
    public function __construct(CrawlerWorker $crawler)
    {
        parent::__construct($crawler);
    }

    /**
     * @inheritdoc
     */
    public function handleSuccessfulResponse(): void
    {
        $this->dig();
    }

    /**
     * Recursively dig links depends on task's parameters
     */
    public function dig()
    {
        // actions before recursive crawl

        // crawl

        // actions after recursive crawl
    }
}
