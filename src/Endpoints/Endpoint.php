<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Client;

abstract class Endpoint
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function filterEmptyValues(array $array): array
    {
        return array_filter(
            $array,
            function ($value) {
                return ! is_null($value);
            }
        );
    }
}
