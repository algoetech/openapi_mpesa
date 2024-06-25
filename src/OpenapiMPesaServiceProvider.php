<?php

namespace Algoetech\OpenapiMPesa;

use Illuminate\Support\Facades\Config;
use Openpesa\SDK\Pesa;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Algoetech\OpenapiMPesa\Exceptions\OpenapiMPesaException;


class OpenapiMPesaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('openapi_mpesa')
            ->hasConfigFile('openapi_mpesa');
    }

    public function packageRegistered()
    {
        $this->app->singleton('openapimpesa', function () {
            
            $pKey = Config::get('openapi_mpesa.public_key');
            $apiKey = Config::get('openapi_mpesa.api_key');
            $environment = Config::get('openapi_mpesa.environment');

            if (is_null($pKey)) {
                throw new OpenapiMpesaException('Please provide a public key in the config file');
            }
            if (is_null($apiKey)) {
                throw new OpenapiMpesaException('Please provide an api key in the config file');
            }

            return new Pesa([
                'api_key' => $apiKey,
                'public_key' => $pKey,
                'environment' => $environment,
            ]);
        });
    }
}