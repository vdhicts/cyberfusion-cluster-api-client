<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class SshKey implements Model
{
    public string $name;
    public string $publicKey;
    public int $unixUserId;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
