<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\ListFilter;

class UnixUsers extends Endpoint
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
            ->setUrl(sprintf('unix-users/?%s', http_build_query($filter->toArray())));

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
            ->setUrl(sprintf('unix-users/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param int $id
     * @return Response
     * @throws RequestException
     */
    public function usages(int $id): Response
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_GET)
            ->setUrl(sprintf('unix-users/usages/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\UnixUser $unixUser
     * @return Response
     * @throws RequestException
     */
    public function create(Models\UnixUser $unixUser): Response
    {
        $requiredAttributes = [
            'username',
            'password',
            'defaultPhpVersion',
            'clusterId',
        ];
        $this->validateRequired($unixUser, 'create', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('unix-users/')
            ->setBody($this->filterFields($unixUser->toArray(), [
                'username',
                'password',
                'default_php_version',
                'cluster_id',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\UnixUser $unixUser
     * @return Response
     * @throws RequestException
     */
    public function update(Models\UnixUser $unixUser): Response
    {
        $requiredAttributes = [
            'username',
            'password',
            'defaultPhpVersion',
            'id',
            'clusterId',
            'unixId',
        ];
        $this->validateRequired($unixUser, 'update', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_PUT)
            ->setUrl(sprintf('unix-users/%d', $unixUser->id))
            ->setBody($this->filterFields($unixUser->toArray(), [
                'username',
                'password',
                'default_php_version',
                'id',
                'cluster_id',
                'unix_id',
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
            ->setUrl(sprintf('unix-users/%d', $id));

        return $this
            ->client
            ->request($request);
    }
}
