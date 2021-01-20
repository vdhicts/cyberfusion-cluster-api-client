<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\ListFilter;

class FpmPools extends Endpoint
{
    /**
     * @param ListFilter|null $filter
     * @return Response
     * @throws RequestException
     */
    public function list(ListFilter $filter = null): Response
    {
        if (is_null($filter)) {
            $filter = new ListFilter();
        }

        $request = (new Request())
            ->setMethod(Request::METHOD_GET)
            ->setUrl(sprintf('fpm-pools/?%s', http_build_query($filter->toArray())));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param int $id
     * @return Response
     * @throws RequestException
     */
    public function get(int $id): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_GET)
            ->setUrl(sprintf('fpm-pools/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\FpmPool $fpmPool
     * @return Response
     * @throws RequestException
     */
    public function create(Models\FpmPool $fpmPool): Response
    {
        $requiredAttributes = [
            'name',
            'unixUserId',
            'version',
            'max_children',
        ];
        $this->validateRequired($fpmPool, 'create', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('fpm-pools')
            ->setBody($this->filterFields($fpmPool->toArray(), [
                'name',
                'unix_user_id',
                'version',
                'max_children',
                'max_requests',
                'process_idle_timeout',
                'cpu_limit',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\FpmPool $fpmPool
     * @return Response
     * @throws RequestException
     */
    public function update(Models\FpmPool $fpmPool): Response
    {
        $requiredAttributes = [
            'id',
            'clusterId'
        ];
        $this->validateRequired($fpmPool, 'update', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_PUT)
            ->setUrl(sprintf('fpm-pools/%d', $fpmPool->id))
            ->setBody($this->filterFields($fpmPool->toArray(), [
                'name',
                'unix_user_id',
                'version',
                'max_children',
                'max_requests',
                'process_idle_timeout',
                'cpu_limit',
                'id',
                'cluster_id',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param int $id
     * @return Response
     * @throws RequestException
     */
    public function delete(int $id): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_DELETE)
            ->setUrl(sprintf('fpm-pools/%d', $id));

        return $this
            ->client
            ->request($request);
    }
}
