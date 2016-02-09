<?php namespace Buycraft\Plugin\Responses;

use Buycraft\Plugin\Models\Account;
use Buycraft\Plugin\Models\Server;
use GuzzleHttp\Psr7\Response;

/**
 * Class InformationResponse
 */
class InformationResponse
{
    /**
     * Account model
     * @var Account
     */
    private $account;

    /**
     * Server model
     * @var Server
     */
    private $server;

    /**
     * InformationResponse constructor.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(Response $response)
    {
        $object = json_decode($response->getBody());

        $this->account = new Account($object->account);
        $this->server = new Server($object->server);
    }

    /**
     * @return \Buycraft\Plugin\Models\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return \Buycraft\Plugin\Models\Server
     */
    public function getServer()
    {
        return $this->server;
    }
}