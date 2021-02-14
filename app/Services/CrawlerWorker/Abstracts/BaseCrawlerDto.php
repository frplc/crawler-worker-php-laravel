<?php
declare(strict_types=1);
/**
 * Date: 14.02.21
 * Time: 1:38
 */
namespace App\Services\CrawlerWorker\Abstracts;

use App\Services\CrawlerWorker\Interfaces\CrawlerDto;

abstract class BaseCrawlerDto implements CrawlerDto
{

    /**
     * @var array
     */
    protected array $headers;

    /**
     * @var int
     */
    protected int $statusCode;

    /**
     * @var int
     */
    protected int $requestIndex;

    /**
     * @var string
     */
    protected string $requestedUrl;

    /**
     * @var string
     */
    protected string $arbitraryMessage;

    /**
     * @var mixed
     */
    protected $response;

    /**
     * @param string $arbitraryMessage
     */
    public function setArbitraryMessage(string $arbitraryMessage)
    {
        $this->arbitraryMessage = $arbitraryMessage;
    }

    /**
     * @param int $requestIndex
     */
    public function setRequestIndex(int $requestIndex): void
    {
        $this->requestIndex = $requestIndex;
    }

    /**
     * @param string $requestedUrl
     */
    public function setRequestedUrl(string $requestedUrl): void
    {
        $this->requestedUrl = $requestedUrl;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getRequestedUrl(): string
    {
        return $this->requestedUrl;
    }

    /**
     * @return int
     */
    public function getRequestIndex(): int
    {
        return $this->requestIndex;
    }

    /**
     * @return string
     */
    public function getArbitraryMessage(): string
    {
        return $this->arbitraryMessage;
    }

    public function getResponse()
    {
        return $this->response;
    }

}
