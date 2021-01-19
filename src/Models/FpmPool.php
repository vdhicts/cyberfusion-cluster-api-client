<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class FpmPool implements Model
{
    public string $name;
    public int $unixUserId;
    public string $version;
    public int $maxChildren;
    public int $maxRequests = 1000;
    public int $processIdleTimeout = 600;
    public int $cpuLimit;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
