<?php

if (! function_exists('openapimpesa')) {
    /**
     * Get the pesa instance.
     *
     * @return \Openpesa\SDK\Pesa
     */
    function pesa()
    {
        return app('openapimpesa');
    }
}