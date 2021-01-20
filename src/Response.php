<?php

namespace Vdhicts\Cyberfusion\ClusterApi;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\ResponseException;

class Response
{
    private int $statusCode;
    private string $statusMessage;
    private array $data;

    /**
     * Response constructor.
     * @param int $statusCode
     * @param string $statusMessage
     * @param array $data
     */
    public function __construct(int $statusCode, string $statusMessage, array $data = [])
    {
        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;
        $this->data = $data;
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
    public function getStatusMessage(): string
    {
        return $this->statusMessage;
    }

    public function isSuccess(): bool
    {
        return $this->statusCode < 300;
    }

    /**
     * @param string|null $attribute
     * @return mixed
     * @throws ResponseException
     */
    public function getData(string $attribute = null)
    {
        if (! is_null($attribute)) {
            return $this->data;
        }

        if (! array_key_exists($attribute, $this->data)) {
            throw ResponseException::attributeNotInResponse($attribute, array_keys($this->data));
        }

        return $this->data[$attribute];
    }
}
