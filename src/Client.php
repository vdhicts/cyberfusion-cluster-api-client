<?php

namespace Vdhicts\Cyberfusion\ClusterApi;

use GuzzleHttp\Client as GuzzleClient;
use Throwable;
use Vdhicts\Cyberfusion\ClusterApi\Contracts\Client as ClientContract;
use Vdhicts\Cyberfusion\ClusterApi\Exceptions\ClientException;
use Vdhicts\Cyberfusion\ClusterApi\Exceptions\ClusterApiException;
use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;

class Client implements ClientContract
{
    private Configuration $configuration;
    private GuzzleClient $httpClient;

    /**
     * Client constructor.
     * @param Configuration $configuration
     * @param bool $manuallyAuthorize
     * @throws ClusterApiException
     */
    public function __construct(Configuration $configuration, bool $manuallyAuthorize = false)
    {
        $this->configuration = $configuration;

        if (! $manuallyAuthorize) {
            $this->authorize();
        }
    }

    /**
     * @throws ClusterApiException
     */
    private function authorize(): void
    {
        if (! $this->configuration->hasAccessToken() && ! $this->configuration->hasCredentials()) {
            throw ClientException::authenticationMissing();
        }

        // The access token is provided, so check if the token is valid
        if ($this->configuration->hasAccessToken()) {
            $accessTokenValid = $this->validateAccessToken();
            if ($accessTokenValid) {
                return;
            }
        }

        // The access token isn't provided or valid, so check if the username/password can be used
        if ($this->configuration->hasCredentials()) {
            $credentialsValid = $this->retrieveAndStoreAccessToken();
            if (! $credentialsValid) {
                throw ClientException::invalidCredentials();
            }
        }

        throw ClientException::authenticationFailed();
    }

    /**
     * @return bool
     * @throws RequestException
     */
    private function validateAccessToken(): bool
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('login/test-token');

        $response = $this->request($request);
        if (! $response->isSuccess()) {
            return false;
        }

        return $response->getData('is_active');
    }

    /**
     * @return bool
     * @throws RequestException
     */
    private function retrieveAndStoreAccessToken(): bool
    {
        $request = (new Request())
            ->setMethod(Request::METHOD_POST)
            ->setUrl('login/access-token')
            ->setBody([
                'username' => $this->configuration->getUsername(),
                'password' => $this->configuration->getPassword(),
            ])
            ->setAuthenticationRequired(false);

        $response = $this->request($request);
        if (! $response->isSuccess()) {
            return false;
        }

        $this
            ->configuration
            ->setAccessToken($response->getData('access_token'));
        return true;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws RequestException
     */
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
            'http_errors' => false,
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
        } catch (Throwable $exception) {
            throw RequestException::requestFailed($exception->getMessage());
        }

        $body = $response->getStatusCode() < 300
            ? json_decode($response->getBody(), true)
            : [];
        return new Response($response->getStatusCode(), $response->getReasonPhrase(), $body);
    }
}
