<?php namespace Buycraft\Plugin\Models;

/**
 * Class Command
 * @package Buycraft\Plugin\Models
 */
class Command
{
    /**
     * The Id of the command
     * @var
     */
    private $id;

    /**
     * The command to execute
     * @var
     */
    private $command;

    /**
     * The ID of the payment the command relates to
     * @var
     */
    private $payment;

    /**
     * The ID of the package the command relates to
     * @var
     */
    private $package;

    /**
     * The conditions model
     * @var Conditions
     */
    private $conditions;

    /**
     * The player model (Not returned on certain command queue endpoints)
     * @var Player
     */
    private $player;

    /**
     * Command model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->command = $object->command;
        $this->payment = $object->payment;
        $this->package = $object->package;

        if(isset($object->player))
        {
            $this->player = new Player($object->player);
        }

        $this->conditions = new Conditions($object->conditions);
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
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return Conditions
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * @return mixed
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}