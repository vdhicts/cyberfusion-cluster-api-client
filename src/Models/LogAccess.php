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
}
