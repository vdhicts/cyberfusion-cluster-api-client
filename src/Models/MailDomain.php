<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class MailDomain implements Model
{
    public string $domain;
    public int $unixUserId;
    public int $id;
    public int $clusterId;
    public string $createdAt;
    public string $updatedAt;
}
