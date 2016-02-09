<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Payment;
use GuzzleHttp\Psr7\Response;

/**
 * Class PaymentsResponse
 * @package Buycraft\Plugin\Responses
 */
class PaymentsResponse
{
    /**
     * Array of payment models
     * @var array
     */
    private $payments = [];

    /**
     * PaymentsResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $objects = json_decode($response->getBody());

        foreach($objects as $object)
        {
            $this->payments[] = new Payment($object);
        }
    }

    /**
     * @return array|Payment
     */
    public function getPayments()
    {
        return $this->payments;
    }
}