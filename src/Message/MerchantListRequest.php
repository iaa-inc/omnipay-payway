<?php
/**
 * PaywayRest Transaction Detail Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Merchant ListRequest
 *
 * @link https://www.payway.com.au/docs/rest.html#list-merchants
 */
class MerchantListRequest extends AbstractRequest
{
    public function getData(): array
    {
        return [];
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/merchants';
    }

    public function getHttpMethod(): string
    {
        return 'GET';
    }

    public function getUseSecretKey(): bool
    {
        return true;
    }
}
