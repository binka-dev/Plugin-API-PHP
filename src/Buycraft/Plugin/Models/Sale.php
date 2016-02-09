<?php namespace Buycraft\Plugin\Models;

/**
 * Class Sale
 * @package Buycraft\Plugin\Models
 */
class Sale
{
    /**
     * If the sale is active
     *
     * @var
     */
    private $active;

    /**
     * The amount the sale discounts against the package
     *
     * @var
     */
    private $discount;

    /**
     * Sale model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->active = $object->active;
        $this->discount = $object->discount;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}