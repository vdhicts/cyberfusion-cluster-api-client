<?php

namespace Vdhicts\Cyberfusion\ClusterApi;

class Configuration
{
    private string $username;
    private string $password;
    private string $url;

    /**
     * Configuration constructor.
     * @param string $username
     * @param string $password
     * @param string $url
     */
    public function __construct(
        string $username,
        string $password,
        string $url = 'https://cluster-api.cyberfusion.nl/api/v1/'
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
