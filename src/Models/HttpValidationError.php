<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class HttpValidationError implements Model
{
    public array $detail = [];

    public function toArray(): array
    {
        return [
            'detail' => $this->detail,
        ];
    }
}