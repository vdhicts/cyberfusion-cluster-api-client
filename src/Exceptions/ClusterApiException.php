<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Exceptions;

use Exception;

class ClusterApiException extends Exception
{
    protected const AUTHENTICATION_REQUIRED = 100;
    protected const AUTHENTICATION_FAILED = 101;
    protected const REQUEST_FAILED = 102;

    protected const RESPONSE_MISSING_ATTRIBUTE = 200;
}
