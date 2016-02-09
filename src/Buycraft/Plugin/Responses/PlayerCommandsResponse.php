<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Command;
use GuzzleHttp\Psr7\Response;

/**
 * Class PlayerCommandsResponse
 * @package Buycraft\Plugin\Responses
 */
class PlayerCommandsResponse
{
    /**
     * Array of command models
     * @var array
     */
    private $commands = [];

    /**
     * PlayerCommandsResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $object = json_decode($response->getBody());

        foreach($object->commands as $command)
        {
            $this->commands[] = new Command($command);
        }
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }
}