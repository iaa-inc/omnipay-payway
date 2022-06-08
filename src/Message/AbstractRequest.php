<?php /** @noinspection PhpUnused */

/**
 * PaywayRest Abstract Request.
 */

namespace Omnipay\PaywayRest\Message;


/**
 * PayWay REST API Abstract Request.
 *
 * This is the parent class for all PayWay requests.
 *
 * TODO: Add usage documentation, including live and test details
 *
 * @see \Omnipay\PaywayRest\Gateway
 * @link https://www.payway.com.au/rest-docs/index.html
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /** @var string Endpoint URL */
    protected string $endpoint = 'https://api.payway.com.au/rest/v1';

    /**
     * Get API publishable key
     * @return string
     */
    public function getApiKeyPublic(): string
    {
        return $this->getParameter('apiKeyPublic');
    }

    /**
     * Set API publishable key
     * @param string $value API publishable key
     */
    public function setApiKeyPublic(string $value): self
    {
        return $this->setParameter('apiKeyPublic', $value);
    }

    /**
     * Get API secret key
     * @return string
     */
    public function getApiKeySecret(): string
    {
        return $this->getParameter('apiKeySecret');
    }

    /**
     * Set API secret key
     * @param string $value API secret key
     */
    public function setApiKeySecret(string $value): self
    {
        return $this->setParameter('apiKeySecret', $value);
    }

    /**
     * Get Merchant
     * @return string Merchant ID
     */
    public function getMerchantId(): string
    {
        return $this->getParameter('merchantId');
    }

    /**
     * Set Merchant
     * @param string $value Merchant ID
     */
    public function setMerchantId(string $value): self
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * Get Use Secret Key setting
     * @return bool Use secret API key if true
     */
    public function getUseSecretKey(): bool
    {
        return $this->getParameter('useSecretKey');
    }

    /**
     * Set Use Secret Key setting
     */
    public function setUseSecretKey(bool $value): self
    {
        return $this->setParameter('useSecretKey', $value);
    }

    /**
     * Get single-use token
     * @return string Token key
     */
    public function getSingleUseTokenId(): string
    {
        return $this->getParameter('singleUseTokenId');
    }

    /**
     * Set single-use token
     * @param string $value Token Key
     */
    public function setSingleUseTokenId(string $value): self
    {
        return $this->setParameter('singleUseTokenId', $value);
    }

    /**
     * Get Idempotency Key
     * @return string Idempotency Key
     */
    public function getIdempotencyKey(): string
    {
        return $this->getParameter('idempotencyKey') ?: uniqid();
    }

    /**
     * Set Idempotency Key
     * @param string $value Idempotency Key
     */
    public function setIdempotencyKey(string $value): self
    {
        return $this->setParameter('idempotencyKey', $value);
    }

    public function getCustomerNumber()
    {
        return $this->getParameter('customerNumber');
    }

    public function setCustomerNumber($value): self
    {
        return $this->setParameter('customerNumber', $value);
    }

    public function getTransactionType()
    {
        return $this->getParameter('transactionType');
    }

    public function setTransactionType($value): self
    {
        return $this->setParameter('transactionType', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value): self
    {
        return $this->setParameter('amount', $value);
    }

    public function getPrincipalAmount()
    {
        return $this->getParameter('principalAmount');
    }

    public function setPrincipalAmount($value): self
    {
        return $this->setParameter('principalAmount', $value);
    }

    public function getCurrency(): ?string
    {
        // PayWay expects lowercase currency values
        return ($this->getParameter('currency'))
            ? strtolower($this->getParameter('currency'))
            : null;
    }

    public function setCurrency($value): self
    {
        return $this->setParameter('currency', $value);
    }

    public function getOrderNumber()
    {
        return $this->getParameter('orderNumber');
    }

    public function setOrderNumber($value): self
    {
        return $this->setParameter('orderNumber', $value);
    }

    public function getBankAccountId()
    {
        return $this->getParameter('bankAccountId');
    }

    public function setBankAccountId($value): self
    {
        return $this->setParameter('bankAccountId', $value);
    }

    public function getBankAccountBsb()
    {
        return $this->getParameter('bankAccountBsb');
    }

    public function setBankAccountBsb($value): self
    {
        return $this->setParameter('bankAccountBsb', $value);
    }

    public function getBankAccountNumber()
    {
        return $this->getParameter('bankAccountNumber');
    }

    public function setBankAccountNumber($value): self
    {
        return $this->setParameter('bankAccountNumber', $value);
    }

    public function getBankAccountName()
    {
        return $this->getParameter('bankAccountName');
    }

    public function setBankAccountName($value): self
    {
        return $this->setParameter('bankAccountName', $value);
    }

    public function getCustomerName()
    {
        return $this->getParameter('customerName');
    }

    public function setCustomerName($value): self
    {
        return $this->setParameter('customerName', $value);
    }

    public function getEmailAddress()
    {
        return $this->getParameter('emailAddress');
    }

    public function setEmailAddress($value): self
    {
        return $this->setParameter('emailAddress', $value);
    }

    public function getSendEmailReceipts()
    {
        return $this->getParameter('sendEmailReceipts');
    }

    public function setSendEmailReceipts($value): self
    {
        return $this->setParameter('sendEmailReceipts', $value);
    }

    public function getPhoneNumber()
    {
        return $this->getParameter('phoneNumber');
    }

    public function setPhoneNumber($value): self
    {
        return $this->setParameter('phoneNumber', $value);
    }

    public function getStreet1()
    {
        return $this->getParameter('street1');
    }

    public function setStreet1($value): self
    {
        return $this->setParameter('street1', $value);
    }

    public function getStreet2()
    {
        return $this->getParameter('street2');
    }

    public function setStreet2($value): self
    {
        return $this->setParameter('street2', $value);
    }

    public function getCityName()
    {
        return $this->getParameter('cityName');
    }

    public function setCityName($value): self
    {
        return $this->setParameter('cityName', $value);
    }

    public function getState()
    {
        return $this->getParameter('state');
    }

    public function setState($value): self
    {
        return $this->setParameter('state', $value);
    }

    public function getPostalCode()
    {
        return $this->getParameter('postalCode');
    }

    public function setPostalCode($value): self
    {
        return $this->setParameter('postalCode', $value);
    }

    public function getTransactionReference()
    {
        return $this->getParameter('transactionReference');
    }

    public function setTransactionReference($value): self
    {
        return $this->setParameter('transactionReference', $value);
    }

    public function getTransactionId()
    {
        return $this->getParameter('transactionId');
    }

    public function setTransactionId($value): self
    {
        return $this->setParameter('transactionId', $value);
    }

    public function getFrequency()
    {
        return $this->getParameter('frequency') ?: 'once';
    }

    public function setFrequency($value): self
    {
        return $this->setParameter('frequency', $value);
    }

    public function getNextPaymentDate()
    {
        // default to today's date
        return $this->getParameter('nextPaymentDate') ?: date('j M Y');
    }

    public function setNextPaymentDate($value): self
    {
        return $this->setParameter('nextPaymentDate', $value);
    }

    public function getRegularPrincipalAmount()
    {
        return $this->getParameter('regularPrincipalAmount');
    }

    public function setRegularPrincipalAmount($value): self
    {
        return $this->setParameter('regularPrincipalAmount', $value);
    }

    public function getNextPrincipalAmount()
    {
        return $this->getParameter('nextPrincipalAmount');
    }

    public function setNextPrincipalAmount($value): self
    {
        return $this->setParameter('nextPrincipalAmount', $value);
    }

    public function getNumberOfPaymentsRemaining()
    {
        return $this->getParameter('numberOfPaymentsRemaining');
    }

    public function setNumberOfPaymentsRemaining($value): self
    {
        return $this->setParameter('numberOfPaymentsRemaining', $value);
    }

    public function getFinalPrincipalAmount()
    {
        return $this->getParameter('finalPrincipalAmount');
    }

    public function setFinalPrincipalAmount($value): self
    {
        return $this->setParameter('finalPrincipalAmount', $value);
    }

    public function setSSLCertificatePath($value): self
    {
        return $this->setParameter('sslCertificatePath', $value);
    }

    public function getSSLCertificatePath()
    {
        return $this->getParameter('sslCertificatePath');
    }

    /**
     * Get HTTP method
     * @return string HTTP method (GET, PUT, etc)
     */
    public function getHttpMethod(): string
    {
        return 'GET';
    }

    /**
     * Get request headers
     * @return array Request headers
     */
    public function getRequestHeaders(): array
    {
        // common headers
        $headers = array(
            'Accept' => 'application/json',
        );

        // set content type
        if ($this->getHttpMethod() !== 'GET') {
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';
        }

        // prevent duplicate POSTs
        if ($this->getHttpMethod() === 'POST') {
            $headers['Idempotency-Key'] = $this->getIdempotencyKey();
        }

        $apikey = ($this->getUseSecretKey()) ? $this->getApiKeySecret() : $this->getApiKeyPublic();
        $headers['Authorization'] = 'Basic ' . base64_encode($apikey . ':');

        return $headers;
    }

    /**
     * Send data request
     * @param  [type] $data [description]
     * @return Response [type]       [description]
     */
    public function sendData($data): Response
    {
        $response = $this
            ->httpClient
            ->request(
                $this->getHttpMethod(),
                $this->getEndpoint(),
                $this->getRequestHeaders(),
                $data
            );

        $this->response = new Response($this, $response->getBody());

        // save additional info
        $this->response->setHttpResponseCode($response->getStatusCode());
        $this->response->setTransactionType($this->getTransactionType());

        return $this->response;
    }

    /**
     * Add multiple parameters to data
     * @param array $data Data array
     * @param array $params Parameters to add to data
     */
    public function addToData(array $data = [], array $params = []): array
    {
        foreach ($params as $parm) {
            $getter = 'get' . ucfirst($parm);
            if (method_exists($this, $getter) && $this->$getter()) {
                $data[$parm] = $this->$getter();
            }
        }

        return $data;
    }
}
