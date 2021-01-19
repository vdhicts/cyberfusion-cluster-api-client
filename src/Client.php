<?php

namespace Vdhicts\Cyberfusion\ClusterApi;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;

class Client
{
    private Configuration $configuration;
    private GuzzleClient $httpClient;

    /**
     * Client constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function request(Request $request): Response
    {
        if ($request->authenticationRequired() && ! $this->configuration->hasAccessToken()) {
            throw RequestException::authenticationRequired();
        }

        $requestOptions = [
            'base_uri' => $this->configuration->getUrl(),
            'timeout' => 180,
            'connect_timeout' => 60,
            'form_params' => $request->getBody(),
        ];
        if ($request->authenticationRequired()) {
            $requestOptions['headers'] = [
                'Authorization' => sprintf('Bearer %s', $this->configuration->getAccessToken()),
            ];
        }

        try {
            $response = $this
                ->httpClient
                ->request($request->getMethod(), $request->getUrl(), $requestOptions);
        } catch (Exception $exception) {
            throw RequestException::requestFailed($exception->getMessage());
        }

        $body = $response->getStatusCode() < 300
            ? json_decode($response->getBody())
            : [];
        return new Response($response->getStatusCode(), $response->getReasonPhrase(), $body);
    }
}
