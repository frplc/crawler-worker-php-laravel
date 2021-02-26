<?php
declare(strict_types=1);
/**
 * Date: 12.02.21
 * Time: 23:22
 */
namespace App\Console\Commands;

use App\Adjutants\LogAdjutant;
use App\Interfaces\TaskDto;
use App\Services\CrawlerWorker\QueueHandler;

use Illuminate\Console\Command;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class CrawlerWorkerCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:worker:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler worker on php';

    /**
     * @var Logger
     */
    protected Logger $logger;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->configureLogger();
    }

    public function handle(): void
    {
        try {
            $this->logger->info("Start worker");

            $taskDto = $this->resolveTask();
            $this->crawl($taskDto);

            $this->logger->info("Finish worker");
        } catch (\Throwable $e) {
            $this->logger->critical(LogAdjutant::makeLogMessage($e));
        }
    }

    protected function resolveTask(): TaskDto
    {
        $queueHandler = new QueueHandler();
        return $queueHandler->retrieveTask();
    }

    protected function crawl(TaskDto $taskDto): void
    {
        $crawler = CrawlerWorkerFactory::makeCrawler($taskDto->getCrawlerType());

        $crawler->setLogger($this->logger);
        $crawler->setTaskDto($taskDto);
        $crawler->configure();

        $crawler->crawl();

        $crawler->performActionsAfterCrawl();
    }

    protected function configureLogger(): void
    {
        $this->logger = Log::getFacadeRoot()->driver();
    }

}
