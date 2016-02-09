<?php namespace Buycraft\Plugin\Models;

/**
 * Class Category
 * @package Buycraft\Plugin\Models
 */
class Category
{
    /**
     * ID of the category
     * @var
     */
    private $id;

    /**
     * Order of the category
     * @var
     */
    private $order;

    /**
     * Name of the category
     * @var
     */
    private $name;

    /**
     * If this category should not be displayed
     * (Only used to display sub categories in the webstore navigation)
     *
     * @var
     */
    private $onlySubcategories;

    /**
     * Array of subcategory models
     *
     * @var array
     */
    private $subcategories = [];

    /**
     * Array of package models
     *
     * @var array
     */
    private $packages = [];

    /**
     * Category model
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->order = $object->order;
        $this->name = $object->name;
        $this->onlySubcategories = $object->only_subcategories;

        foreach($object->subcategories as $subcategory)
        {
            $this->subcategories[] = new Category($subcategory);
        }

        foreach($object->packages as $package)
        {
            $this->packages[] = new Package($package);
        }
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
    public function getOnlySubcategories()
    {
        return $this->onlySubcategories;
    }

    /**
     * @return mixed
     */
    public function getSubcategories()
    {
        return $this->subcategories;
    }

    /**
     * @return Package
     */
    public function getPackages()
    {
        return $this->packages;
    }
}