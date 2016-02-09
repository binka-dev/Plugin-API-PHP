<?php namespace Buycraft\Plugin\Models;

/**
 * Class Player
 * @package Buycraft\Plugin\Models
 */
class Player
{
    /**
     * ID of the player on the Buycraft network
     * @var
     */
    private $id;

    /**
     * Mojang UUID
     * @var
     */
    private $uuid;

    /**
     * Minecraft username
     * @var
     */
    private $name;

    /**
     * Player model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->uuid = $object->uuid;
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

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}