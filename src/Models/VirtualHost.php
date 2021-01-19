<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;

class VirtualHost implements Model
{
    public string $domain;
    public array $serverAliases;
    public int $unixUserId;
    public string $documentRoot;
    public int $fpmPoolId;
    public bool $forceSsl;
    public string $customConfig;
    public int $id;
    public int $clusterId;
    public array $deployCommands;
    public string $createdAt;
    public string $updatedAt;

    public function toArray(): array
    {
        return [
            'domain' => $this->domain,
            'server_aliases' => $this->serverAliases,
            'unix_user_id' => $this->unixUserId,
            'document_root' => $this->documentRoot,
            'fpm_pool_id' => $this->fpmPoolId,
            'force_ssl' => $this->forceSsl,
            'custom_config' => $this->customConfig,
            'id' => $this->id,
            'cluster_id' => $this->clusterId,
            'deploy_commands' => $this->deployCommands,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
