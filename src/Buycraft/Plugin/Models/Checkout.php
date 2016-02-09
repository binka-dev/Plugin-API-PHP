<?php namespace Buycraft\Plugin\Models;

use Carbon\Carbon;

/**
 * Class Checkout
 * @package Buycraft\Plugin\Models
 */
class Checkout
{
    /**
     * The URL to redirect the player to
     *
     * @var
     */
    private $url;

    /**
     * The time the URL will expire
     *
     * @var Carbon
     */
    private $expires;

    public function __construct($object)
    {
        $this->url = $object->url;
        $this->expires = new Carbon($object->expires);
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getExpires()
    {
        return $this->expires;
    }
}