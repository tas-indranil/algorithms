<?php
class DatabaseConnection
{
    private static $instance;
    private $connection;

    private function loadFromEnv()
    {
        return "Loading from ENV file ";
    }

    private function __construct()
    {
        $this->connection = "This is connected ".$this->loadFromEnv();
    }

    public static function getInstance()
    {
        if(self::$instance === null)
        {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getData(string $data)
    {
        return $this->connection.$data;
    }
}

$database = DatabaseConnection::getInstance();
print_r($database->getData("Hello world"));
