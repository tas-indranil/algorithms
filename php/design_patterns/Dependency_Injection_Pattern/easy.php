<?php
interface Logger
{
    public function log($message);
}

class DataLogger implements Logger
{
    public function log($message)
    {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

// Class that depends on Logger interface through constructor injection
class UserManager
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function registerUser($userName)
    {
        $this->logger->log("username is {$userName}");
    }
}

$dataLogger = new DataLogger();
$fileStore = new UserManager($dataLogger);
$fileStore->registerUser("John Wick");