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
}
