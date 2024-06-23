<?php

namespace Algoetech\OpenapiMpesa;

use Illuminate\Support\Facades\Config;
use Openpesa\SDK\Pesa;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Algoetech\OpenapiMpesa\Exceptions\AlgoetechOpenapiMpesaException;


class AlgoetechOpenApiMPesaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('openapi_mpesa')
            ->hasConfigFile('openapi_mpesa');
    }

    public function packageRegistered()
    {
        $this->app->singleton('pesa', function () {
            
            $pKey = Config::get('openapi_mpesa.public_key');
            $apiKey = Config::get('openapi_mpesa.api_key');
            $environment = Config::get('openapi_mpesa.environment');

            if (is_null($pKey)) {
                throw new AlgoetechOpenapiMpesaException('Please provide a public key in the config file');
            }
            if (is_null($apiKey)) {
                throw new AlgoetechOpenapiMpesaException('Please provide an api key in the config file');
            }

            return new Pesa([
                'api_key' => $apiKey,
                'public_key' => $pKey,
                'environment' => $environment,
            ]);
        });
    }
}