<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\LogFilter;

class Logs extends Endpoint
{
    /**
     * @param int $virtualHostId
     * @param LogFilter $filter
     * @return Response
     * @throws RequestException
     */
    public function accessLogs(int $virtualHostId, LogFilter $filter): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_GET)
            ->setUrl(sprintf('logs/access/%d/?%s', $virtualHostId, http_build_query($filter->toArray())));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param int $virtualHostId
     * @param LogFilter $filter
     * @return Response
     * @throws RequestException
     */
    public function errorLogs(int $virtualHostId, LogFilter $filter): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_GET)
            ->setUrl(sprintf('logs/error/%d/?%s', $virtualHostId, http_build_query($filter->toArray())));

        return $this
            ->client
            ->request($request);
    }
}
