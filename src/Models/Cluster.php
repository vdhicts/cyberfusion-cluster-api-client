<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Cluster implements Model
{
    public string $name;
    public string $group;
    public int $id;
    public string $createdAt;
    public string $updatedAt;
}
