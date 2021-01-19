<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Certificate implements Model
{
    public array $commonNames;
    public string $certificate;
    public string $cachain;
    public string $privateKey;
    public int $id;
    public string $statusMessage;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
