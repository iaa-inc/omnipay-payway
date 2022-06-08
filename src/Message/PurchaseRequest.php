<?php

/**
 * PaywayRest Purchase Request
 */

namespace Omnipay\PaywayRest\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * PaywayRest Purchase Request
 *
 * @see \Omnipay\PaywayRest\Gateway
 * @link https://www.payway.com.au/rest-docs/index.html#process-a-payment
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate(
            'customerNumber',
            'principalAmount',
            'currency'
        );

        $data = array(
            'customerNumber' => $this->getCustomerNumber(),
            'transactionType' => 'payment',
            'principalAmount' => $this->getPrincipalAmount(),
            'currency' => $this->getCurrency(),
        );

        if ($orderNumber = $this->getOrderNumber()) {
            $data['orderNumber'] = $orderNumber;
        }
        if ($merchantId = $this->getMerchantId()) {
            $data['merchantId'] = $merchantId;
        }
        if ($bankAccountId = $this->getBankAccountId()) {
            $data['bankAccountId'] = $bankAccountId;
        }
        if ($singleUseTokenId = $this->getSingleUseTokenId()) {
            $data['singleUseTokenId'] = $singleUseTokenId;
        }

        return $data;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint . '/transactions';
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getUseSecretKey(): bool
    {
        return true;
    }
}
