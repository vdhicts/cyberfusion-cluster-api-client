<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Endpoints;

use DateTimeInterface;
use Illuminate\Support\Arr;
use Vdhicts\Cyberfusion\ClusterApi\Contracts\Client as ClientContract;
use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;
use Vdhicts\Cyberfusion\ClusterApi\Exceptions\RequestException;

abstract class Endpoint
{
    protected ClientContract $client;

    /**
     * Endpoint constructor.
     * @param ClientContract $client
     */
    public function __construct(ClientContract $client)
    {
        $this->client = $client;
    }

    /**
     * @param Model $model
     * @param string $action
     * @param array $requiredAttributes
     * @throws RequestException
     */
    protected function validateRequired(Model $model, string $action, array $requiredAttributes = []): void
    {
        $modelFields = $model->toArray();

        $missing = [];
        foreach ($requiredAttributes as $requiredAttribute) {
            $value = $modelFields[$requiredAttribute] ?? null;
            if (is_null($value)) {
                $missing[] = $requiredAttribute;
                continue;
            }

            if (is_string($value) && trim($value) === '') {
                $missing[] = $requiredAttribute;
            }
        }

        if (count($missing) === 0) {
            return;
        }

        throw RequestException::invalidRequest(get_class($model), $action, $missing);
    }

    /**
     * @param array $array
     * @param array $fields
     * @return array
     */
    protected function filterFields(array $array, array $fields = []): array
    {
        $filteredArray = array_filter(
            $array,
            function ($value) {
                return !is_null($value);
            }
        );

        if (count($fields) === 0) {
            return $filteredArray;
        }

        return Arr::only($filteredArray, $fields);
    }

    /**
     * @param string $url
     * @param array $optionalQueryParameters
     * @return string
     */
    protected function applyOptionalQueryParameters(string $url, array $optionalQueryParameters = []): string
    {
        if (count($optionalQueryParameters) === 0) {
            return $url;
        }

        $optionalQueryParametersFiltered = array_filter($optionalQueryParameters);

        $optionalQueryParametersPrepared = array_map(
            function ($optionalQueryParameter) {
                if ($optionalQueryParameter instanceof DateTimeInterface) {
                    return $optionalQueryParameter->format('c');
                }

                return $optionalQueryParameter;
            },
            $optionalQueryParametersFiltered
        );

        return sprintf('%s?%s', $url, http_build_query($optionalQueryParametersPrepared));
    }
}
