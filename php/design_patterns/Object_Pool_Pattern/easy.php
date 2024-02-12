<?php
// Class representing a simple database connection

class DatabaseConnection {
    private $connectionId;

    public function __construct($connectionId) {
        $this->connectionId = $connectionId;
        // Simulate expensive connection setup
        sleep(1);
    }

    public function query($sql) {
        // Simulate database query
        return "Results for query: $sql";
    }

    public function getConnectionId() {
        return $this->connectionId;
    }
}

class DatabaseConnectionPool
{
    private $connections = [];

    public function getConnection()
    {
        if(count($this->connections) < 5)
        {
            $connectionId = count($this->connections) + 1;
            $connection = new DatabaseConnection($connectionId);
            $this->connections[$connectionId] = $connection;
            return $connection;
        }else{
            return array_pop($this->connections);
        }
    }

    public function releaseConnection($connection) {
        $this->connections[$connection->getConnectionId()] = $connection;
        echo "Database connection released: {$connection->getConnectionId()}\n";
    }
}
// Usage:
$pool = new DatabaseConnectionPool();

// Acquire connections
$connection1 = $pool->getConnection();
$connection2 = $pool->getConnection();

// Use connections
echo $connection1->query("SELECT * FROM users");
echo "\n";
echo $connection2->query("SELECT * FROM orders");
echo "\n";
$pool->releaseConnection($connection1);
echo "\n";
$pool->releaseConnection($connection2);
