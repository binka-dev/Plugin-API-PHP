<?php namespace Buycraft\Plugin\Models;

/**
 * Class Package
 * @package Buycraft\Plugin\Models
 */
class Package
{
    /**
     * The ID of the package
     *
     * @var
     */
    private $id;

    /**
     * The order of the package
     *
     * @var
     */
    private $order;

    /**
     * The name of the package
     *
     * @var
     */
    private $name;

    /**
     * The price of the package
     *
     * @var
     */
    private $price;

    /**
     * Sale model instance
     *
     * @var Sale
     */
    private $sale;

    /**
     * Package model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->order = $object->order;
        $this->name = $object->name;
        $this->price = $object->price;

        $this->sale = new Sale($object->sale);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return Sale
     */
    public function getSale()
    {
        return $this->sale;
    }
}