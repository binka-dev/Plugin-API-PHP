<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Player;
use GuzzleHttp\Psr7\Response;

/**
 * Class DuePlayersResponse
 * @package Buycraft\Plugin\Responses
 */
class DuePlayersResponse
{
    /**
     * Array of meta data relevant to the request
     * @var
     */
    private $meta;

    /**
     * Array of due players
     *
     * @var array
     */
    private $players = [];

    /**
     * DuePlayersResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $object = json_decode($response->getBody());

        $this->meta = [
            "execute_offline" => $object->meta->execute_offline,
            "next_check" => $object->meta->next_check,
            "more" => $object->meta->more
        ];

        foreach($object->players as $player)
        {
            $this->players[] = new Player($player);
        }
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @return array
     */
    public function getPlayers()
    {
        return $this->players;
    }
}