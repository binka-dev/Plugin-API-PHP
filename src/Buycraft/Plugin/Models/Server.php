<?php namespace Buycraft\Plugin\Models;

/**
 * Class Server
 * @package Buycraft\Plugin\Models
 */
class Server
{
    /**
     * ID of the server
     * @var
     */
    private $id;

    /**
     * Name of the server
     * @var
     */
    private $name;

    /**
     * Server model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
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
    public function getName()
    {
        return $this->name;
    }
}