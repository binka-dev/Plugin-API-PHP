<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Command;
use GuzzleHttp\Psr7\Response;

/**
 * Class OfflineCommandsResponse
 * @package Buycraft\Plugin\Responses
 */
class OfflineCommandsResponse
{
    /**
     * Meta data relevant to the response
     *
     * @var array
     */
    private $meta;

    /**
     * Array of command models
     * @var array
     */
    private $commands = [];

    /**
     * OfflineCommandsResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $object = json_decode($response->getBody());

        $this->meta = [
            "limited" => $object->meta->limited
        ];

        foreach($object->commands as $command)
        {
            $this->commands[] = new Command($command);
        }
    }

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }
}