<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Cron implements Model
{
    public string $name;
    public string $command;
    public string $emailAddress;
    public string $schedule;
    public int $unixUserId;
    public int $errorCount = 1;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'command' => $this->command,
            'email_address' => $this->emailAddress,
            'schedule' => $this->schedule,
            'unix_user_id' => $this->unixUserId,
            'error_count' => $this->errorCount,
            'id' => $this->id,
            'cluster_id' => $this->clusterId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
