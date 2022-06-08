<?php /** @noinspection PhpUnused */

namespace Omnipay\PaywayRest;

use JetBrains\PhpStorm\ArrayShape;
use Omnipay\Common\AbstractGateway;
use Omnipay\PaywayRest\Message\BankAccountListRequest;
use Omnipay\PaywayRest\Message\CheckNetworkRequest;
use Omnipay\PaywayRest\Message\CreateCustomerRequest;
use Omnipay\PaywayRest\Message\CreateSingleUseBankTokenRequest;
use Omnipay\PaywayRest\Message\CreateSingleUseCardTokenRequest;
use Omnipay\PaywayRest\Message\CustomerDetailRequest;
use Omnipay\PaywayRest\Message\MerchantListRequest;
use Omnipay\PaywayRest\Message\PurchaseRequest;
use Omnipay\PaywayRest\Message\RegularPaymentRequest;
use Omnipay\PaywayRest\Message\TransactionDetailRequest;
use Omnipay\PaywayRest\Message\UpdateCustomerContactRequest;

/**
 * PayWay Credit Card gateway
 */
class Gateway extends AbstractGateway
{
    public function getName(): string
    {
        return 'Westpac PayWay Credit Card';
    }

    #[ArrayShape(['apiKeyPublic' => "string", 'apiKeySecret' => "string", 'merchantId' => "string", 'useSecretKey' => "false"])] public function getDefaultParameters(): array
    {
        return array(
            'apiKeyPublic' => '',
            'apiKeySecret' => '',
            'merchantId' => '',
            'useSecretKey' => false,
        );
    }

    /**
     * Get API publishable key
     *
     * @return string
     */
    public function getApiKeyPublic(): string
    {
        return $this->getParameter('apiKeyPublic');
    }

    /**
     * Set API publishable key
     *
     * @param string $value API publishable key
     */
    public function setApiKeyPublic(string $value): self
    {
        return $this->setParameter('apiKeyPublic', $value);
    }

    /**
     * Get API secret key
     *
     * @return string
     */
    public function getApiKeySecret(): string
    {
        return $this->getParameter('apiKeySecret');
    }

    /**
     * Set API secret key
     *
     * @param string $value API secret key
     */
    public function setApiKeySecret(string $value): self
    {
        return $this->setParameter('apiKeySecret', $value);
    }

    /**
     * Get Merchant
     *
     * @return string Merchant ID
     */
    public function getMerchantId(): string
    {
        return $this->getParameter('merchantId');
    }

    /**
     * Set Merchant
     *
     * @param string $value Merchant ID
     */
    public function setMerchantId(string $value): self
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * Set SSL Certificate Path
     *
     * @param string $value SSL Certificate Path
     */
    public function setSSLCertificatePath(string $value): self
    {
        return $this->setParameter('sslCertificatePath', $value);
    }

    /**
     * Get SSL Certificate Path
     *
     * @return string SSL Certificate Path
     */
    public function getSSLCertificatePath(): string
    {
        return $this->getParameter('sslCertificatePath');
    }

    /**
     * Test the PayWay gateway
     *
     * @param array $parameters Request parameters
     * @return CheckNetworkRequest
     */
    public function testGateway(array $parameters = array()): Message\CheckNetworkRequest
    {
        /** @var Message\CheckNetworkRequest $response */
        $response = $this->createRequest(
            '\Omnipay\PaywayRest\Message\CheckNetworkRequest',
            $parameters
        );
        return $response;
    }

    /**
     * Purchase request
     *
     * @param array $options
     * @return PurchaseRequest|RegularPaymentRequest
     */
    public function purchase(array $options = array()): Message\PurchaseRequest|Message\RegularPaymentRequest
    {
        //TODO: create customer before payment if none supplied

        // schedule regular payment
        if (isset($options['frequency']) && $options['frequency'] !== 'once') {
            /** @var Message\RegularPaymentRequest $response */
            $response = $this->createRequest('\Omnipay\PaywayRest\Message\RegularPaymentRequest', $options);
            return $response;
        }

        // process once-off payment
        /** @var Message\PurchaseRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\PurchaseRequest', $options);
        return $response;
    }

    /**
     * Create singleUseTokenId with a CreditCard
     *
     * @param array $parameters
     * @return CreateSingleUseCardTokenRequest
     */
    public function createSingleUseCardToken(array $parameters = array()): Message\CreateSingleUseCardTokenRequest
    {
        /** @var Message\CreateSingleUseCardTokenRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\CreateSingleUseCardTokenRequest', $parameters);
        return $response;
    }

    /**
     * Create singleUseTokenId with a Bank Account
     *
     * @param array $parameters
     * @return CreateSingleUseBankTokenRequest
     */
    public function createSingleUseBankToken(array $parameters = array()): Message\CreateSingleUseBankTokenRequest
    {
        /** @var Message\CreateSingleUseBankTokenRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\CreateSingleUseBankTokenRequest', $parameters);
        return $response;
    }

    /**
     * Create Customer
     *
     * @param array $parameters
     * @return CreateCustomerRequest
     */
    public function createCustomer(array $parameters = array()): Message\CreateCustomerRequest
    {
        /** @var Message\CreateCustomerRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\CreateCustomerRequest', $parameters);
        return $response;
    }

    /**
     * Update Customer contact details
     *
     * @param array $parameters
     * @return UpdateCustomerContactRequest
     */
    public function updateCustomerContact(array $parameters = array()): Message\UpdateCustomerContactRequest
    {
        /** @var Message\UpdateCustomerContactRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\UpdateCustomerContactRequest', $parameters);
        return $response;
    }

    /**
     * Get Customer details
     *
     * @param array $parameters
     * @return CustomerDetailRequest
     */
    public function getCustomerDetails(array $parameters = array()): Message\CustomerDetailRequest
    {
        /** @var Message\CustomerDetailRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\CustomerDetailRequest', $parameters);
        return $response;
    }

    /**
     * Get Transaction details
     *
     * @param array $parameters
     * @return TransactionDetailRequest
     */
    public function getTransactionDetails(array $parameters = array()): Message\TransactionDetailRequest
    {
        /** @var Message\TransactionDetailRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\TransactionDetailRequest', $parameters);
        return $response;
    }

    /**
     * Get List of Merchants
     *
     * @param array $parameters
     * @return MerchantListRequest
     */
    public function getMerchants(array $parameters = array()): Message\MerchantListRequest
    {
        /** @var Message\MerchantListRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\MerchantListRequest', $parameters);
        return $response;
    }

    /**
     * Get List of Bank Accounts
     *
     * @param array $parameters
     * @return BankAccountListRequest
     */
    public function getBankAccounts(array $parameters = array()): Message\BankAccountListRequest
    {
        /** @var Message\BankAccountListRequest $response */
        $response = $this->createRequest('\Omnipay\PaywayRest\Message\BankAccountListRequest', $parameters);
        return $response;
    }
}
