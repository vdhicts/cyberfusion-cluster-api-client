<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class VirtualHost implements Model
{
    public string $domain;
    public array $serverAlias;
    public int $unixUserId;
    public string $documentRoot;
    public int $fpmPoolId;
    public bool $forceSsl;
    public string $customConfig;
    public int $id;
    public int $clusterId;
    public array $deployCommands;
    public string $createdAt;
    public string $updatedAt;
}
