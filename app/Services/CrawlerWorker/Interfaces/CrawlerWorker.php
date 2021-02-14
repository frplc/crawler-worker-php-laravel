<?php
/**
 * Date: 12.02.21
 * Time: 22:25
 */
namespace App\Services\CrawlerWorker\Interfaces;

use Illuminate\Log\Logger;

interface CrawlerWorker
{
    /**
     * Initialize crawler params and settings
     */
    public function configure(): void;

    /**
     * Perform main crawling actions
     */
    public function crawl(): void;

    /**
     * Perform some post-crawling actions, such as notifications, sending logs,
     * "deconfiguration activity" (related to auth actions), etc.
     */
    public function performActionsAfterCrawl(): void;

    /**
     * @param Logger $logger
     */
    public function setLogger(Logger $logger): void;

    /**
     * @param TaskDto $taskDto
     */
    public function setTaskDto(TaskDto $taskDto): void;

    /**
     * @return TaskDto
     */
    public function getTaskDto(): TaskDto;
    /**
     * @return Logger
     */
    public function getLogger(): Logger;

}
