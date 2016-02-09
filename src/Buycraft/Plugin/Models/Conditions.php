<?php namespace Buycraft\Plugin\Models;

/**
 * Class Conditions
 * @package Buycraft\Plugin\Models
 */
class Conditions
{
    /**
     * The delay of the command
     * @var int
     */
    private $delay = 0;

    /**
     * Required inventory slots of the command
     * @var int
     */
    private $slots = 0;

    /**
     * Conditions model.
     * @param $object
     */
    public function __construct($object)
    {
        $this->delay = isset($object->delay) ? $object->delay : 0;
        $this->slots = isset($object->slots) ? $object->slots : 0;
    }

    /**
     * @return int
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @return int
     */
    public function getSlots()
    {
        return $this->slots;
    }
}