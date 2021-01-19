<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Token implements Model
{
    public string $accessToken;
    public string $tokenType;
}
