<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class LogError implements Model
{
    public string $remoteAddress;
    public string $rawMessage;
    public string $method;
    public string $uri;
    public string $timestamp;
    public string $errorMessage;

    public function toArray(): array
    {
        return [
            'remote_address' => $this->remoteAddress,
            'raw_message' => $this->rawMessage,
            'method' => $this->method,
            'uri' => $this->uri,
            'timestamp' => $this->timestamp,
            'error_message' => $this->errorMessage,
        ];
    }
}
