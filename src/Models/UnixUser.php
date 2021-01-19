<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class UnixUser implements Model
{
    public string $username;
    public string $password;
    public string $defaultPhpVersion;
    public int $clusterId;
    public int $id;
    public int $unixId;
    public string $createdAt;
    public string $updatedAt;
}
