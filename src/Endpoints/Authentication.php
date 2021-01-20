<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;

class Authentication extends Endpoint
{
    /**
     * @param Models\Login $login
     * @return Response
     * @throws RequestException
     */
    public function login(Models\Login $login): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('login/access-token')
            ->setBody($this->filterFields($login->toArray()))
            ->setAuthenticationRequired(false);

        return $this
            ->client
            ->request($request);
    }

    /**
     * @return Response
     * @throws RequestException
     */
    public function verify(): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('login/test-token');

        return $this
            ->client
            ->request($request);
    }
}
