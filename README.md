<h1 align="center">Algoetech OpenAPI Mpesa</h1>

<p align="center">
    <a href="https://packagist.org/packages/openpesa/laravel-pesa">
        <img src="https://img.shields.io/packagist/v/openpesa/laravel-pesa.svg?style=flat-square" alt="Latest Version on Packagist">
    </a>
    <a href="https://packagist.org/packages/openpesa/laravel-pesa">
        <img src="https://img.shields.io/packagist/dt/openpesa/laravel-pesa.svg?style=flat-square" alt="Total Downloads">
    </a>
</p>

<p align="center">
 <picture>
      <source media="(prefers-color-scheme: dark)" srcset="./img/banner/header-dark.png">
      <img alt="Algoetech OpenAPI Mpesa" src="./img/banner/header-light.png">
    </picture>
 <p align="center">Offers effortless integration with mobile money operators, such as Vodacom's M-Pesa, for seamless inclusion in your Laravel applications. 💰</p>
</p>


## Documentation

🚧 **Work in Progress**

For detailed instructions on package usage, please refer to the example readme available [here](https://github.com/alphaolomi/laravel-pesa-demo).

## 🚀 Installation

You can install the package via Composer:

```bash

composer require algoetech/openapi_mpesa

```

## 💼 Usage

### Using Facades

*Web|api Route
```php
    Route::post('/pay', [PaymentController::class, 'payment'])->name('payments_api');
```
*Controller [ PaymentController ]
```php

use Openpesa\Pesa\Facades\Pesa;

// This function will be mapped to web|api route: `your-URL/api/pay`
// assuming you have data captured from a form 
public function payment(PaymentApiRequest $req) {
    $response = Pesa::c2b([
        'input_Amount' => $req->price, // Amount to be charged
        'input_Country' => 'TZN',
        'input_Currency' => 'TZS',
        'input_CustomerMSISDN' => '255'.$req->msisdn, // assuming you capture phone number without country code and zero
        'input_ServiceProviderCode' => '000001', // Replace with your service provider code given by M-Pesa
        'input_ThirdPartyConversationID' => 'mpesatz', // Unique [use a rand function to isolate ConversationId]
        'input_TransactionReference' => 'imethibitishwa', // Unique []
        'input_PurchasedItemsDesc' => $req->item
    ]);
    
    // make your logics to handle responses here
    return $response;
};

```

## 💼 Usage

```bash

composer test

```



## 👥 Credits

-   [All Contributors](../../contributors)

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.