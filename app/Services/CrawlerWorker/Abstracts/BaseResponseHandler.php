<?php
declare(strict_types=1);
/**
 * Date: 13.02.21
 * Time: 23:20
 */
namespace App\Services\CrawlerWorker\Abstracts;

use App\Services\CrawlerWorker\Interfaces\CrawlerDto;
use App\Services\CrawlerWorker\Interfaces\CrawlerWorker;

abstract class BaseResponseHandler
{
    /**
     * @var CrawlerWorker
     */
    protected CrawlerWorker $crawler;

    /**
     * @var CrawlerDto
     */
    protected CrawlerDto $crawlerDto;

    /**
     * BaseResponseHandler constructor.
     * @param CrawlerWorker $crawler
     */
    public function __construct(CrawlerWorker $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @inheritdoc
     */
    public function handleRejectedResponse(): void
    {
        // handle
    }

    /**
     * @param CrawlerDto $crawlerDto
     */
    public function setCrawlerDto(CrawlerDto $crawlerDto): void
    {
        $this->crawlerDto = $crawlerDto;
    }

    /**
     * @return CrawlerDto
     */
    public function getCrawlerDto(): CrawlerDto
    {
        return $this->crawlerDto;
    }

}
