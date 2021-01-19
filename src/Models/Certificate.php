<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Certificate implements Model
{
    public array $commonNames = [];
    public ?string $certificate = null;
    public ?string $cachain = null;
    public ?string $privateKey = null;
    public ?int $id = null;
    public ?string $statusMessage = null;
    public ?int $clusterId = null;
    public ?string $createdAt = null;
    public ?string $updatedAt = null;

    public function toArray(): array
    {
        return [
            'common_names' => $this->commonNames,
            'certificate' => $this->certificate,
            'ca_chain' => $this->cachain,
            'private_key' => $this->privateKey,
            'id' => $this->id,
            'status_message' => $this->statusMessage,
            'cluster_id' => $this->clusterId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
