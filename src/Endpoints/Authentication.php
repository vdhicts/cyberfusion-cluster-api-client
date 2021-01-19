<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;

class Authentication extends Endpoint
{
    public function login(Models\Login $login): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('login/access-token')
            ->setBody($this->filterEmptyValues($login->toArray()))
            ->setAuthenticationRequired(false);

        $response = $this
            ->client
            ->request($request);
        if (! $response->isSuccess()) {
            throw RequestException::authenticationFailed();
        }

        return $response;
    }

    public function verify(Models\Token $token): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('login/test-token');

        return $this
            ->client
            ->request($request);
    }
}
