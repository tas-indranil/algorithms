<?php
interface Database
{
    public function query($sql);
}

class MySQLDatabase implements Database
{
    /**
     * @var mysqli
     */
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->connection = new mysqli($host, $username, $password, $database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }
}

class UserRepo
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }


    public function getUserInfo($id)
    {
        $sql = "SELECT * FROM user_info where id = $id";
        return $this->database->query($sql);
    }
}

$database = new MySQLDatabase('localhost', 'root', '', 'rnd_upload_file');
$userRepo = new UserRepo($database);
print_r($userRepo->getUserInfo(1));