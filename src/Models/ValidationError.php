<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class ValidationError implements Model
{
    public array $loc;
    public string $msg;
    public string $type;
}
