<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class UserInfo implements Model
{
    public string $username;
    public bool $isActive;
    public bool $isProvisioningUser;
    public bool $isSuperUser;
    public array $clusters;
}
