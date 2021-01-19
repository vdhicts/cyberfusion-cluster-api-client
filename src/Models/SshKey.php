<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class SshKey implements Model
{
    public string $name;
    public string $publicKey;
    public int $unixUserId;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'public_key' => $this->publicKey,
            'unix_user_id' => $this->unixUserId,
            'id' => $this->id,
            'cluster_id' => $this->clusterId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
