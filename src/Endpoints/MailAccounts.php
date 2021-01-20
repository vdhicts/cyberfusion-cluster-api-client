<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;
use Vdhicts\Cyberfusion\ClusterApi\Models;
use Vdhicts\Cyberfusion\ClusterApi\Request;
use Vdhicts\Cyberfusion\ClusterApi\Response;
use Vdhicts\Cyberfusion\ClusterApi\Support\ListFilter;

class MailAccounts extends Endpoint
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
            ->setUrl(sprintf('mail-accounts/?%s', http_build_query($filter->toArray())));

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
            ->setUrl(sprintf('mail-accounts/%d', $id));

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
            ->setUrl(sprintf('mail-accounts/usages/%d', $id));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\MailAccount $mailAccount
     * @return Response
     * @throws RequestException
     */
    public function create(Models\MailAccount $mailAccount): Response
    {
        $requiredAttributes = [
            'localPart',
            'password',
            'forwardEmailAddresses',
            'mailDomainId',
        ];
        $this->validateRequired($mailAccount, 'create', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('mail-accounts/')
            ->setBody($this->filterFields($mailAccount->toArray(), [
                'local_part',
                'password',
                'forward_email_addresses',
                'quota',
                'mail_domain_id',
            ]));

        return $this
            ->client
            ->request($request);
    }

    /**
     * @param Models\MailAccount $mailAccount
     * @return Response
     * @throws RequestException
     */
    public function update(Models\MailAccount $mailAccount): Response
    {
        $requiredAttributes = [
            'localPart',
            'password',
            'forwardEmailAddresses',
            'mailDomainId',
            'id',
            'clusterId'
        ];
        $this->validateRequired($mailAccount, 'update', $requiredAttributes);

        $request = (new Request())
            ->setMethod(Request::METHOD_PUT)
            ->setUrl(sprintf('mail-accounts/%d', $mailAccount->id))
            ->setBody($this->filterFields($mailAccount->toArray(), [
                'local_part',
                'password',
                'forward_email_addresses',
                'quota',
                'mail_domain_id',
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
            ->setUrl(sprintf('mail-accounts/%d', $id));

        return $this
            ->client
            ->request($request);
    }
}
