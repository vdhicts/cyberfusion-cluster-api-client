<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class Health implements Model
{
    public string $status;

    public function toArray(): array
    {
        return [
            'status' => $this->status,
        ];
    }
}
