<?php
// Class representing a database connection
class DatabaseConnection {
    private $connection;

    public function __construct($host, $username, $password, $database) {
        // Establish the database connection
        $this->connection = new mysqli($host, $username, $password, $database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        // Close the database connection
        $this->connection->close();
    }
}

// Object Pool class for managing database connections
class DatabaseConnectionPool {
    private $connections = [];
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function getConnection() {
        if (empty($this->connections)) {
            return $this->createConnection();
        } else {
            return array_pop($this->connections);
        }
    }

    public function releaseConnection($connection) {
        $this->connections[] = $connection;
    }

    private function createConnection() {
        return new DatabaseConnection(
            $this->config['host'],
            $this->config['username'],
            $this->config['password'],
            $this->config['database']
        );
    }
}

// Configuration for database connection
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'rnd_upload_file'
];

// Create a database connection pool
$pool = new DatabaseConnectionPool($config);

// Usage:
$connection1 = $pool->getConnection();
$result1 = $connection1->query("SELECT * FROM user_info");
print_r($result1);
$connection1->close();

$connection2 = $pool->getConnection();
$result2 = $connection2->query("SELECT * FROM info_table LIMIT 10");
print_r($result2);
$connection2->close();

// Release connections back to the pool
$pool->releaseConnection($connection1);
$pool->releaseConnection($connection2);
