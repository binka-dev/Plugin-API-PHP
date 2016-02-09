<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Checkout;
use GuzzleHttp\Psr7\Response;

/**
 * Class CheckoutResponse
 * @package Buycraft\Plugin\Responses
 */
class CheckoutResponse
{
    public $checkout;

    /**
     * CheckoutResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $object = json_decode($response->getBody());

        $this->checkout = new Checkout($object);
    }

    /**
     * @return Checkout
     */
    public function getCheckout()
    {
        return $this->checkout;
    }
}