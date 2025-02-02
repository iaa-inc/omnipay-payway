<?php
/**
 * PaywayRest Transaction Detail Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Bank Account List Request
 *
 * @link https://www.payway.com.au/docs/rest.html#your-bank-accounts
 */
class BankAccountListRequest extends AbstractRequest
{
    public function getData(): array
    {
        return [];
    }

    public function getEndpoint(): string
    {
        return $this->endpoint . '/your-bank-accounts';
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
