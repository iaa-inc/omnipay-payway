<?php /** @noinspection PhpUnused */
/**
 * PayWayRest Response
 */

namespace Omnipay\PaywayRest\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PaywayRest Response
 *
 * Response class for all PaywayRest requests
 * @see \Omnipay\PaywayRest\Gateway
 */
class Response extends AbstractResponse
{
    protected ?string $requestId = null;
    protected ?string $httpResponseCode = null;
    protected ?string $transactionType = null;

    /**
     * Is the transaction successful?
     */
    public function isSuccessful(): bool
    {
        // get response code
        $code = $this->getHttpResponseCode();

        if ($code === 200) {  // OK
            return true;
        }

        if ($code === 201) {   // Created
            if ($this->getTransactionType() === 'payment') {
                return $this->isApproved();
            }
            return true;
        }

        if ($code === 202 && $this->isPending()) {   // Accepted
            return true;
        }

        return false;
    }

    /**
     * Is the transaction approved?
     */
    public function isApproved(): bool
    {
        return in_array($this->getStatus(), array(
            'approved',
            'approved*',
        ));
    }

    /**
     * Is the transaction pending?
     */
    public function isPending(): bool
    {
        return (
            $this->getTransactionType() === 'payment'
            && $this->getStatus() === 'pending'
        );
    }

    /**
     * Get Transaction ID
     */
    public function getTransactionId(): ?string
    {
        return $this->getData('transactionId');
    }

    /**
     * Get Transaction reference
     */
    public function getTransactionReference(): ?string
    {
        return $this->getData('receiptNumber');
    }

    /**
     * Get Customer Number
     */
    public function getCustomerNumber(): ?string
    {
        return $this->getData('customerNumber');
    }

    /**
     * Get Contact details
     */
    public function getContact(): ?array
    {
        return $this->getData('contact');
    }

    /**
     * Get status
     */
    public function getStatus(): ?string
    {
        return $this->getData('status');
    }

    /**
     * Get response data, optionally by key
     */
    public function getData(string $key = null): mixed
    {
        if ($key) {
            return $this->data[$key] ?? null;
        }
        return $this->data;
    }

    /**
     * Get error data from response
     */
    public function getErrorData(?string $key = null): mixed
    {
        if ($this->isSuccessful()) {
            return null;
        }
        // get error data (array in data)
        $data = isset($this->getData('data')[0]) ? $this->getData('data')[0] : null;
        if ($key) {
            return $data[$key] ?? null;
        }
        return $data;
    }

    /**
     * Get error message from the response
     */
    public function getMessage(): ?string
    {
        if ($this->getErrorMessage()) {
            return $this->getErrorMessage() . ' (' . $this->getErrorFieldName() . ')';
        }

        if ($this->isSuccessful()) {
            return ($this->getStatus()) ? ucfirst($this->getStatus()) : 'Successful';
        }
        // default to unsuccessful message
        return 'The transaction was unsuccessful.';
    }

    /**
     * Get code
     */
    public function getCode(): string
    {
        return sprintf("%s %s (%s %s)",
            $this->getResponseCode(),
            $this->getResponseText(),
            $this->getHttpResponseCode(),
            $this->getHttpResponseCodeText()
        );
    }

    /**
     * Get error message from the response
     * @return string|null Error message or null if successful
     */
    public function getErrorMessage(): ?string
    {
        return $this->getErrorData('message');
    }

    /**
     * Get field name in error from the response
     * @return string|null Error message or null if successful
     */
    public function getErrorFieldName(): ?string
    {
        return $this->getErrorData('fieldName');
    }

    /**
     * Get field value in error from the response
     * @return string|null Error message or null if successful
     */
    public function getErrorFieldValue(): ?string
    {
        return $this->getErrorData('fieldValue');
    }

    /**
     * Get Payway Response Code
     * @return string Returned response code
     */
    public function getResponseCode(): string
    {
        return $this->getData('responseCode');
    }

    /**
     * Get Payway Response Text
     * @return string Returned response Text
     */
    public function getResponseText(): string
    {
        return $this->getData('responseText');
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * Set request id
     */
    public function setRequestId($requestId): self
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Get HTTP Response Code
     */
    public function getHttpResponseCode(): int
    {
        return $this->httpResponseCode;
    }

    /**
     * Set HTTP Response Code
     */
    public function setHttpResponseCode(int $value): self
    {
        $this->httpResponseCode = $value;
        return $this;
    }

    /**
     * Get HTTP Response code text
     */
    public function getHttpResponseCodeText(): ?string
    {
        $code = $this->getHttpResponseCode();
        $statusTexts = \Symfony\Component\HttpFoundation\Response::$statusTexts;

        return (isset($statusTexts[$code])) ? $statusTexts[$code] : null;
    }

    /**
     * Get transaction type
     * @return string|null Transaction type
     */
    public function getTransactionType(): ?string
    {
        return $this->getData('transactionType');
    }

    /**
     * Get payment method
     * @return string|null Payment method
     */
    public function getPaymentMethod(): ?string
    {
        return $this->getData('paymentMethod');
    }

    /**
     * Get credit card information
     * @return string|null Transaction credit card details
     */
    public function getCreditCard(): ?string
    {
        return $this->getData('creditCard');
    }

    /**
     * Get bank account information
     * @return string|null Transaction bank account details
     */
    public function getBankAccount(): ?string
    {
        return $this->getData('bankAccount');
    }

    /**
     * Set Transaction Type
     */
    public function setTransactionType($value): self
    {
        $this->transactionType = $value;
        return $this;
    }
}
