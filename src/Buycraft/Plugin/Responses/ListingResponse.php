<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Category;
use GuzzleHttp\Psr7\Response;

/**
 * Class ListingResponse
 * @package Buycraft\Plugin\Responses
 */
class ListingResponse
{
    /**
     * Categories model array
     * @var
     */
    private $categories = [];

    /**
     * ListingResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $objects = json_decode($response->getBody())->categories;

        foreach($objects as $object)
        {
            $this->categories[] = new Category($object);
        }
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }
}