<?php namespace Buycraft\Plugin\Models;

/**
 * Class Account
 * @package Buycraft\Plugin\Models
 */
class Account
{
    /**
     * Id of the account
     * @var
     */
    private $id;

    /**
     * Domain of the account
     * @var
     */
    private $domain;

    /**
     * Name of the account
     * @var
     */
    private $name;

    /**
     * Currency instance
     * @var Currency
     */
    private $currency;

    /**
     * If the account is online mode
     * @var
     */
    private $onlineMode;

    /**
     * Account model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->domain = $object->domain;
        $this->name = $object->name;
        $this->onlineMode = $object->online_mode;

        $this->currency = new Currency($object->currency);
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
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Buycraft\Plugin\Models\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getOnlineMode()
    {
        return $this->onlineMode;
    }
}