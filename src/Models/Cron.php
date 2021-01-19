<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Cron implements Model
{
    public string $name;
    public string $command;
    public string $emailAddress;
    public string $schedule;
    public int $unixUserId;
    public int $errorCount = 0;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
