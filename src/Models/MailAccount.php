<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class MailAccount implements Model
{
    public string $localPart;
    public string $password;
    public array $forwardEmailAddresses;
    public int $quota;
    public int $mailDomainId;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
