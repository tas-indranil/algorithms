<?php

interface Logger{
    public function log(string $message);
}

class FileLogger implements Logger{

    public function log(string $message)
    {
        echo "Logged to file: $message.\n";
    }
}

class DatabaseLogger implements Logger {
    public function log(string $message) {
        // Log message to a database
        echo "Logged to database: $message\n";
    }
}

class LoggerFactory
{
    public static function createLogger(string $type): Logger
    {
        switch ($type)
        {
            case 'file':
                return new FileLogger();
            case 'database':
                return new DatabaseLogger();
            default:
                throw new InvalidArgumentException("Invalid logger type: $type.\n");

        }
    }
}

$fileLogger = LoggerFactory::createLogger('file');
$fileLogger->log("This is file log");
$databaseLogger = LoggerFactory::createLogger('database');
$databaseLogger->log('This is a database log.');

$testLogger = LoggerFactory::createLogger('none');
$testLogger->log('This is testing.');