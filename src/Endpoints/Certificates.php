<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\ListFilter;

class Certificates extends Endpoint
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
            ->setUrl(sprintf('certificates/?%s', http_build_query($filter->toArray())));

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
            ->setUrl(sprintf('certificates/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\Certificate $certificate
     * @return Response
     * @throws RequestException
     */
    public function create(Models\Certificate $certificate): Response
    {
        $requiredAttributes = is_null($certificate->certificate)
            ? ['commonNames', 'clusterId'] // Request Let's Encrypt certificate
            : ['certificate', 'cachain', 'privateKey', 'clusterId']; // Supply own certificate
        $this->validateRequired($certificate, 'create', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('certificates')
            ->setBody($this->filterFields($certificate->toArray(), [
                'common_names',
                'certificate',
                'ca_chain',
                'private_key',
                'cluster_id',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\Certificate $certificate
     * @return Response
     * @throws RequestException
     */
    public function update(Models\Certificate $certificate): Response
    {
        $requiredAttributes = [
            'id',
            'clusterId'
        ];
        $this->validateRequired($certificate, 'update', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_PATCH)
            ->setUrl(sprintf('certificates/%d', $certificate->id))
            ->setBody($this->filterFields($certificate->toArray(), [
                'common_names',
                'certificate',
                'ca_chain',
                'private_key',
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
            ->setUrl(sprintf('certificates/%d', $id));

        return $this
            ->client
            ->request($request);
    }
}
