<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Illuminate\Support\Arr;
use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Cluster implements Model
{
    public string $name;
    public ?array $groups = [];
    public ?string $dataDirectory = null;
    public ?int $id = null;
    public ?string $createdAt = null;
    public ?string $updatedAt = null;

    public function fromArray(array $data): Cluster
    {
        $cluster = new self();
        $cluster->name = Arr::get($data, 'name');
        $cluster->groups = Arr::get($data, 'groups', []);
        $cluster->dataDirectory = Arr::get($data, 'data_directory');
        $cluster->id = Arr::get($data, 'id');
        $cluster->createdAt = Arr::get($data, 'created_at');
        $cluster->updatedAt = Arr::get($data, 'updated_at');
        return $cluster;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'groups' => $this->groups,
            'data_directory' => $this->dataDirectory,
            'id' => $this->id,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
