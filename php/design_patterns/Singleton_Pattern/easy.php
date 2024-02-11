<?php

class Singleton
{
    private static $instance;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if(self::$instance == null)
        {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function showMessage()
    {
        echo "Its working";
    }
}

$singletonInstance = Singleton::getInstance();
$singletonInstance->showMessage();