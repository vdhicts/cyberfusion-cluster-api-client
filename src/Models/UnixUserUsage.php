<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class UnixUserUsage implements Model
{
    public string $path;
    public int $size;
}
