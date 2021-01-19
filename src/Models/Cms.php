<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Cms implements Model
{
    public string $name;
    public int $virtualHostId;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
