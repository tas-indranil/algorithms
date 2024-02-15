<?php

class LazyLoading
{
    private $connection = null;

    public function __construct()
    {
        // database connection not established here
    }

    public function getConnection()
    {
        if($this->connection === null)
        {
            $this->connection = new PDO("mysql:host=localhost;dbname=rnd_upload_file", "root", "");
        }
        return $this->connection;
    }
}

$database = new LazyLoading();
// Lazy initialization: Connection is established only when getConnection() is called
$database->getConnection();