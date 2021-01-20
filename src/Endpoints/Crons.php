<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\ListFilter;

class Crons extends Endpoint
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
            ->setUrl(sprintf('crons/?%s', http_build_query($filter->toArray())));

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
            ->setUrl(sprintf('crons/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\Cron $cron
     * @return Response
     * @throws RequestException
     */
    public function create(Models\Cron $cron): Response
    {
        $requiredAttributes = [
            'name',
            'command',
            'emailAddress',
            'schedule',
            'unixUserId'
        ];
        $this->validateRequired($cron, 'create', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('crons')
            ->setBody($this->filterFields($cron->toArray(), [
                'name',
                'command',
                'email_address',
                'schedule',
                'unix_user_id',
                'error_count',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\Cron $cron
     * @return Response
     * @throws RequestException
     */
    public function update(Models\Cron $cron): Response
    {
        $requiredAttributes = [
            'name',
            'command',
            'emailAddress',
            'schedule',
            'unixUserId',
            'id',
            'clusterId',
        ];
        $this->validateRequired($cron, 'update', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_PUT)
            ->setUrl(sprintf('crons/%d', $cron->id))
            ->setBody($this->filterFields($cron->toArray(), [
                'name',
                'command',
                'email_address',
                'schedule',
                'unix_user_id',
                'error_count',
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
            ->setUrl(sprintf('crons/%d', $id));

        return $this
            ->client
            ->request($request);
    }
}
