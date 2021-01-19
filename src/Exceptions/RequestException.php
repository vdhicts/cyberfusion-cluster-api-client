<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Exceptions;

use Throwable;

class RequestException extends ClusterApiException
{
    public static function authenticationRequired(Throwable $previous = null): RequestException
    {
        return new self(
            'The request requires authentication, login before making this request',
            self::AUTHENTICATION_REQUIRED,
            $previous
        );
    }

    public static function authenticationFailed(Throwable $previous = null): RequestException
    {
        return new self(
            'Failed to authenticate',
            self::AUTHENTICATION_FAILED,
            $previous
        );
    }

    public static function requestFailed(string $message, Throwable $previous = null): RequestException
    {
        return new self(
            sprintf('Request failed, error: `%s`', $message),
            self::REQUEST_FAILED,
            $previous
        );
    }
}
