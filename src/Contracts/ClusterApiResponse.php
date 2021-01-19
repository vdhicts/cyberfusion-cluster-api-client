<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Contracts;

interface ClusterApiResponse
{
    public function getStatusCode(): int;
    public function getStatusMessage(): string;
    public function isSuccess(): bool;
    public function getData(string $attribute = null);
}
