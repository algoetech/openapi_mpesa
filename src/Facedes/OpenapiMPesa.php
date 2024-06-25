<?php

namespace Algoetech\OpenapiMPesa\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Openpesa\SDK\Pesa
 */
class OpenapiMPesa extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'openapimpesa';
    }
}