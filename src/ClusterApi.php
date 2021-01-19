<?php

namespace Vdhicts\Cyberfusion\ClusterApi;

use Vdhicts\Cyberfusion\ClusterApi\Endpoints;

class ClusterApi
{
    private Client $client;

    /**
     * ClusterApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function authentication(): Endpoints\Authentication
    {
        return new Endpoints\Authentication($this->client);
    }

    public function certificates(): Endpoints\Certificates
    {
        return new Endpoints\Certificates($this->client);
    }

    public function clusters(): Endpoints\Clusters
    {
        return new Endpoints\Clusters($this->client);
    }

    public function cmses(): Endpoints\Cmses
    {
        return new Endpoints\Cmses($this->client);
    }

    public function crons(): Endpoints\Crons
    {
        return new Endpoints\Crons($this->client);
    }

    public function fpmPools(): Endpoints\FpmPools
    {
        return new Endpoints\FpmPools($this->client);
    }

    public function health(): Endpoints\Health
    {
        return new Endpoints\Health($this->client);
    }

    public function logs(): Endpoints\Logs
    {
        return new Endpoints\Logs($this->client);
    }

    public function mailAccounts(): Endpoints\MailAccounts
    {
        return new Endpoints\MailAccounts($this->client);
    }

    public function mailDomains(): Endpoints\MailDomains
    {
        return new Endpoints\MailDomains($this->client);
    }

    public function malwares(): Endpoints\Malwares
    {
        return new Endpoints\Malwares($this->client);
    }

    public function sshKeys(): Endpoints\SshKeys
    {
        return new Endpoints\SshKeys($this->client);
    }

    public function unixUsers(): Endpoints\UnixUsers
    {
        return new Endpoints\UnixUsers($this->client);
    }

    public function virtualHosts(): Endpoints\VirtualHosts
    {
        return new Endpoints\VirtualHosts($this->client);
    }
}
