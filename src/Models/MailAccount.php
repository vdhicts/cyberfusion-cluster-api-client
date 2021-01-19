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

    public function toArray(): array
    {
        return [
            'local_part' => $this->localPart,
            'password' => $this->password,
            'forward_email_addresses' => $this->forwardEmailAddresses,
            'quota' => $this->quota,
            'mail_domain_id' => $this->mailDomainId,
            'id' => $this->id,
            'cluster_id' => $this->clusterId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
