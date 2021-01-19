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

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'default_php_version' => $this->defaultPhpVersion,
            'cluster_id' => $this->clusterId,
            'id' => $this->id,
            'unix_id' => $this->unixId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
