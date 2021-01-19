<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class FpmPool implements Model
{
    public string $name;
    public int $unixUserId;
    public string $version;
    public int $maxChildren;
    public int $maxRequests = 1000;
    public int $processIdleTimeout = 600;
    public int $cpuLimit;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'unix_user_id' => $this->unixUserId,
            'version' => $this->version,
            'max_children' => $this->maxChildren,
            'max_requests' => $this->maxRequests,
            'process_idle_timeout' => $this->processIdleTimeout,
            'cpu_limit' => $this->cpuLimit,
            'id' => $this->id,
            'cluster_id' => $this->clusterId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
