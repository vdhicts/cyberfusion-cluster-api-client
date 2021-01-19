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

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'is_active' => $this->isActive,
            'is_provisioning_user' => $this->isProvisioningUser,
            'is_superuser' => $this->isSuperUser,
            'clusters' => $this->clusters,
        ];
    }
}
