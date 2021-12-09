<?php

namespace Nebula;

use Nebula\Common\ErrorCode;
use Thrift\Exception\TTransportException;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;
use Nebula\Graph\GraphServiceClient;
use Nebula\Graph\VerifyClientVersionReq;

/**
 * GraphClient class used for connecting and executing commands on Nebula.
 *
 * This is the main high-level abstraction of Nebula upon which various other
 * abstractions are built.
 *
 * @author Yanlong He <yanlong@php.net>
 */
class GraphClient
{
    const VERSION = "2.6.0";

    /** @var GraphServiceClient */
    private $connection;

    /** @var string */
    private $sessionId;

    /** @var array */
    private $options;

    /** @var string */
    private $host;

    /** @var int */
    private $port;


    /**
     * @param string $host Set the remote server host or ip for the client.
     * @param int $port Set the remote server port for the client.
     * @param array $options Options to configure some behaviours of the client.
     * @throws TTransportException
     */
    public function __construct(string $host, int $port, array $options = [])
    {
        $this->host = $host;
        $this->port = $port;
        $this->options = $options;
        $this->connection = static::createConnection();
    }

    /**
     * Creates single or aggregate connections form supplied arguments.
     *
     * @return GraphServiceClient
     * @throws TTransportException
     */
    protected function createConnection(): GraphServiceClient
    {
        // todo ssl
        $socket = new TSocket($this->host, $this->port);
        $transport = new TBufferedTransport($socket);
        $protocol = new TBinaryProtocol($transport);
        $transport->open();
        $connection = new GraphServiceClient($protocol);
        $resp = $connection->verifyClientVersion(new VerifyClientVersionReq());
        if ($resp->error_code != ErrorCode::SUCCEEDED) {
            // todo
        }
        return $connection;
    }

    /**
     * Authorize and get a new session.
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function authenticate(string $username, string $password): bool
    {
        $resp = $this->connection->authenticate($username, $password);
        $this->sessionId = $resp->session_id;
        return true;
    }

    /**
     * Execute stmt
     * @param string $stmt The ngql
     */
    public function execute(string $stmt)
    {
        $resp = $this->connection->execute($this->sessionId, $stmt);
    }

    /**
     * Execute stmt
     * @param string $stmt
     */
    public function executeJson(string $stmt)
    {
        $resp = $this->connection->executeJson($this->sessionId, $stmt);
    }
}