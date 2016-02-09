<?php namespace Buycraft\Plugin\Models;

/**
 * Class Currency
 * @package Buycraft\Plugin\Models
 */
class Currency
{
    /**
     * ISO 4217 of the currency
     * @var
     */
    private $iso4217;

    /**
     * Symbol of the currency
     * @var
     */
    private $symbol;

    /**
     * Currency model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->iso4217 = $object->iso_4217;
        $this->symbol = $object->symbol;
    }

    /**
     * @return mixed
     */
    public function getIso4217()
    {
        return $this->iso4217;
    }

    /**
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }
}