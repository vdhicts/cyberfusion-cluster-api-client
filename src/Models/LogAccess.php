<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class LogAccess implements Model
{
    public string $remoteAddress;
    public string $rawMessage;
    public string $method;
    public string $uri;
    public string $timestamp;
    public int $statusCode;
    public int $bytesSent;

    public function toArray(): array
    {
        return [
            'remote_address' => $this->remoteAddress,
            'raw_message' => $this->rawMessage,
            'method' => $this->method,
            'uri' => $this->uri,
            'timestamp' => $this->timestamp,
            'status_code' => $this->statusCode,
            'bytes_sent' => $this->bytesSent,
        ];
    }
}
