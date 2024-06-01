<?php
require  '../ratchet/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class UserActivityServer implements MessageComponentInterface
{
    protected $clients;
    protected $activeUsers;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
        $this->activeUsers = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection in the clients list
        $this->clients->attach($conn);
        echo "New client connected: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Update user's activity
        $this->activeUsers->attach($from);
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Remove the connection from the active users list and clients list
        $this->activeUsers->detach($conn);
        $this->clients->detach($conn);
        echo "Client disconnected: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    public function checkActivity()
    {
        $activeUsers = [];
        foreach ($this->activeUsers as $user) {
            $activeUsers[] = $user->resourceId;
        }

        // Send the list of active users to all connected clients
        foreach ($this->clients as $client) {
            $client->send(json_encode($activeUsers));
        }
    }
}

$server = new \Ratchet\App('localhost', 8080);
$server->route('/', new UserActivityServer(), ['*']);
$server->run();