<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Exceptions;

use Throwable;

class ResponseException extends ClusterApiException
{
    public static function attributeNotInResponse(
        string $attribute,
        array $receivedAttributes = [],
        Throwable $previous = null
    ): ResponseException {
        return new self(
            sprintf(
                'The attribute `%s` is not received, received attributes `%s`',
                $attribute,
                implode(', ', $receivedAttributes)
            ),
            self::RESPONSE_MISSING_ATTRIBUTE,
            $previous
        );
    }
}
