<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\ListFilter;

class VirtualHosts extends Endpoint
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
            ->setUrl(sprintf('virtual-hosts/?%s', http_build_query($filter->toArray())));

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
            ->setUrl(sprintf('virtual-hosts/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\VirtualHost $virtualHost
     * @return Response
     * @throws RequestException
     */
    public function create(Models\VirtualHost $virtualHost): Response
    {
        $requiredAttributes = [
            'domain',
            'serverAliases',
            'unixUserId',
            'documentRoot',
            'forceSsl',
        ];
        $this->validateRequired($virtualHost, 'create', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('virtual-hosts/')
            ->setBody($this->filterFields($virtualHost->toArray(), [
                'domain',
                'server_aliases',
                'unix_user_id',
                'document_root',
                'fpm_pool_id',
                'force_ssl',
                'custom_config',
                'deploy_commands',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\VirtualHost $virtualHost
     * @return Response
     * @throws RequestException
     */
    public function update(Models\VirtualHost $virtualHost): Response
    {
        $requiredAttributes = [
            'domain',
            'serverAliases',
            'unixUserId',
            'documentRoot',
            'forceSsl',
            'id',
            'clusterId',
        ];
        $this->validateRequired($virtualHost, 'update', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_PUT)
            ->setUrl(sprintf('virtual-hosts/%d', $virtualHost->id))
            ->setBody($this->filterFields($virtualHost->toArray(), [
                'domain',
                'server_aliases',
                'unix_user_id',
                'document_root',
                'fpm_pool_id',
                'force_ssl',
                'custom_config',
                'deploy_commands',
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
            ->setUrl(sprintf('virtual-hosts/%d', $id));

        return $this
            ->client
            ->request($request);
    }
}
