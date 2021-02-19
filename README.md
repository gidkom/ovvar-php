# Ovvar

A PHP library to interact with ovvar API

&nbsp;
## Installation  

### With Composer

`composer require gidkom/ovvar-php`


## REQUIREMENTS

- PHP 5.4+

## Usage

### Authentication
Generate an API KEY from the <a href="https://app.ovvar.com" target="_blank">Ovvar dashboard</a>


### Setup

```
<?php
include "vendor/autoload.php";

use Gidkom\Ovvar\Voucher;

$voucher  = new Voucher($apikey);
```

### Generate a new voucher
Simply supply the needed parameters  
**currency**: USD  
**value**: amount value  
**quantity**: number of vouchers to generated  
**channel**: email | sms
**recipient_phone**: phone number to receive voucher pin  
**recipient** email: email to receive voucher pin 

```
<?php
$resp = $voucher->generate([
    'currency' => 'USD',
    'value' => 1500,
    'channel' => 'phone',
    'recipient_phone' => '2349063079039',
    'quantity' => 10
]);
```

### Validate a voucher
Check if voucher is valid
```
<?php
$voucherPin = '12345876';
$resp = $voucher->validate($voucherPin);
```


### Redeem a voucher
Redeem voucher
```
<?php
$voucherPin = '12345876';
$resp = $voucher->redeem($voucherPin);

```


## Response format
```
<?php
# Check result if command is succesful
if($result['status']) {
    # Display result
    print_r($result['data']);
} else {
    # Something went wrong
    echo 'Error: ';
    echo $result['message'];
}

```