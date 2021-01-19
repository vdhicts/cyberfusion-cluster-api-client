<?php

namespace Vdhicts\Cyberfusion\ClusterApi;

class Request
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_PUT = 'PUT';
    public const METHOD_DELETE = 'DELETE';

    private string $method;
    private string $url;
    private array $body;

    /**
     * Request constructor.
     * @param string $method
     * @param string $url
     * @param array $body
     */
    public function __construct(string $method, string $url, array $body = [])
    {
        $this->method = $method;
        $this->url = $url;
        $this->body = $body;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getBody(): array
    {
        return $this->body;
    }
}
