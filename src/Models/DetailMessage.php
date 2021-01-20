<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class DetailMessage implements Model
{
    public string $detail;

    public function toArray(): array
    {
        return [
            'detail' => $this->detail,
        ];
    }
}