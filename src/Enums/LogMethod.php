<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Enums;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Enum;

class LogMethod implements Enum
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const PATCH = 'PATCH';
    public const DELETE = 'DELETE';
    public const HEAD = 'HEAD';
}
