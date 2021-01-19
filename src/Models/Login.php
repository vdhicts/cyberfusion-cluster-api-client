<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Login implements Model
{
    public ?string $grantType;
    public string $username;
    public string $password;
    public ?string $scope;
    public ?string $clientId;
    public ?string $clientSecret;
}
