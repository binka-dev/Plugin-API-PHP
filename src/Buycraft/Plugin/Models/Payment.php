<?php namespace Buycraft\Plugin\Models;

use Carbon\Carbon;

/**
 * Class Payment
 * @package Buycraft\Plugin\Models
 */
class Payment
{
    /**
     * ID of the payment
     * @var
     */
    private $id;

    /**
     * Amount of the payment
     * @var
     */
    private $amount;

    /**
     * Carbon instance of the date of the payment
     * @var Carbon
     */
    private $date;

    /**
     * Currency model
     * @var Currency
     */
    private $currency;

    /**
     * Player model
     * @var Player
     */
    private $player;

    /**
     * Payment model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->amount = $object->amount;

        $this->date = new Carbon($object->date);

        $this->currency = new Currency($object->currency);
        $this->player = new Player($object->player);
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return Carbon
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}