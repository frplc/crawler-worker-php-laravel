<?php
declare(strict_types=1);
/**
 * Date: 13.02.21
 * Time: 22:56
 */
namespace App\Services\CrawlerWorker;

use App\Services\CrawlerWorker\Abstracts\BaseResponseHandler;
use App\Services\CrawlerWorker\Interfaces\CrawlerWorker;

use Illuminate\Support\Facades\Storage;

class FilesHandler extends BaseResponseHandler
{
    /**
     * LinksHandler constructor.
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
        $this->saveFile();
    }

    /**
     * Save files depends on CrawlerDto properties
     */
    protected function saveFile(): void
    {
        $crawler = $this->crawler;
        $dto = $this->getCrawlerDto();
        $logger = $crawler->getLogger();

        $logger->info("Request index: ".$dto->getRequestIndex());
        $logger->info("Request url: " .$dto->getRequestedUrl());

        $fileName = pathinfo($dto->getRequestedUrl(), PATHINFO_BASENAME);
        $filePath = $crawler->getTaskDto()->getFileSavingPath()."/".$fileName;
        Storage::disk('local')->put($filePath, $dto->getResponse()->getBody());

        $logger->info("File ".$fileName." saved");
    }
}
