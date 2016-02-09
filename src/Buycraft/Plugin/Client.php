<?php namespace Buycraft\Plugin;

use Buycraft\Plugin\Exceptions\InputException;
use Buycraft\Plugin\Responses\CheckoutResponse;
use Buycraft\Plugin\Responses\DuePlayersResponse;
use Buycraft\Plugin\Responses\InformationResponse;
use Buycraft\Plugin\Responses\ListingResponse;
use Buycraft\Plugin\Responses\OfflineCommandsResponse;
use Buycraft\Plugin\Responses\PaymentsResponse;
use Buycraft\Plugin\Responses\PlayerCommandsResponse;

/**
 * Class Client
 * @package Buycraft\Plugin
 */
class Client
{
    /**
     * Guzzle instance
     *
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * Client constructor.
     *
     * @param $secretKey
     * @param $endpoint
     */
    public function __construct($secretKey, $endpoint = "https://plugin.buycraft.net")
    {
        $this->guzzle = new \GuzzleHttp\Client([
            'base_uri' => $endpoint,
            'headers' => [
                'User-Agent' => "Plugin-API-SDK",
                'X-Buycraft-Secret' => $secretKey
            ],
            "connect_timeout" => 3,
            "timeout" => 3
        ]);
    }

    /**
     * Retrieve the general account information related to this secret key
     *
     * @return InformationResponse
     */
    public function information()
    {
        $response = $this->guzzle->request("GET", "/information");

        return new InformationResponse($response);
    }

    /**
     * Returns the recent payments of the account
     *
     * @param int $limit
     * @return PaymentsResponse
     * @throws InputException
     */
    public function payments($limit = 100)
    {
        if($limit < 1 || $limit > 100)
        {
            throw new InputException("The limit parameter must be an integer between 1 and 100.");
        }

        $response = $this->guzzle->request("GET", "/payments", [
            "query" => [
                "limit" => $limit
            ]
        ]);

        return new PaymentsResponse($response);
    }

    /**
     * Returns the accounts categories & packages
     *
     * @return ListingResponse
     */
    public function listing()
    {
        $response = $this->guzzle->request("GET", "/listing");

        return new ListingResponse($response);
    }

    /**
     * Create a checkout URL to add a package to a users basket
     *
     * @param $packageID
     * @param $username
     * @return CheckoutResponse
     * @throws InputException
     */
    public function createCheckoutLink($packageID, $username)
    {
        if(strlen($username) < 2 || strlen($username) > 16 || preg_match("/^\w+$/", $username) == false)
        {
            throw new InputException("A valid Minecraft username must be provided.");
        }

        $response = $this->guzzle->request("POST", "/checkout", [
            "query" => [
                "package_id" => $packageID,
                "username" => $username
            ]
        ]);

        return new CheckoutResponse($response);
    }

    /**
     * Returns the players who have due online commands to be executed
     *
     * @param int $page
     * @param int $limit
     * @return DuePlayersResponse
     * @throws InputException
     */
    public function getDuePlayers($page = 1, $limit = 250)
    {
        if($page < 1)
        {
            throw new InputException("The page parameter must be an integer which is 1 or above.");
        }

        if($limit < 1 || $limit > 1000)
        {
            throw new InputException("The limit parameter must be an integer between 1 and 1000.");
        }

        $response = $this->guzzle->request("GET", "/queue", [
            "query" => [
                "page" => $page,
                "limit" => $limit
            ]
        ]);

        return new DuePlayersResponse($response);
    }

    /**
     * Returns the due offline commands
     *
     * @return OfflineCommandsResponse
     */
    public function getDueOfflineCommands()
    {
        $response = $this->guzzle->request("GET", "/queue/offline-commands");

        return new OfflineCommandsResponse($response);
    }

    /**
     * Returns the due online commands to execute for a player
     *
     * @param $playerID
     * @return PlayerCommandsResponse
     */
    public function getPlayersDueOnlineCommands($playerID)
    {
        $response = $this->guzzle->request("GET", "/queue/online-commands/$playerID");

        return new PlayerCommandsResponse($response);
    }

    /**
     * Delete a collection of commands by their IDs
     *
     * @param array|$ids
     * @return void
     */
    public function deleteDueCommands($ids)
    {
        $this->guzzle->request("DELETE", "/queue", [
            "query" => [
                "ids" => $ids
            ]
        ]);
    }
}