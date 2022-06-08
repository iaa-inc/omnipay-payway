<?php

use Omnipay\Common\CreditCard;

error_reporting(E_ALL | E_STRICT);

// include the composer autoloader
$autoloader = require __DIR__ . '/../vendor/autoload.php';

// autoload abstract TestCase classes in test directory
$autoloader->add('Omnipay', __DIR__);

/** @var Omnipay\PaywayRest\DirectDebitGateway $gw */
$gw = \Omnipay\Omnipay::create('PaywayRest_DirectDebit');
$gw->setApiKeyPublic('T15562_PUB_9q7k3x59tkmyvegyqsx69tuuiiykch8tbasabmwcs3kjd67rdi984ciyq4sx')
    ->setApiKeySecret('T15562_SEC_yvnegf5aveezfgidkpnmfxruuydjkcpx6hhusjympptszkxxjf2n4czrw5jj')
    ->setMerchantId('T15562');

$response = $gw->createSingleUseCardToken([
    'card' => new CreditCard([
        'firstName' => 'First Name',
        'lastName' => 'Last Name',
        'number' => '4564710000000004',
        'expiryMonth' => '02',
        'expiryYear' => '2029',
        'cvv' => '847',
    ]),
]);

print_r($response->send()->getTransactionReference());
