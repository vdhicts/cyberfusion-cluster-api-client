<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Enums;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Enum;

class HealthStatus implements Enum
{
    public const UP = 'up';
    public const MAINTENANCE = 'maintenance';
}
