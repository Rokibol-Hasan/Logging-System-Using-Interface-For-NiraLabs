<?php

interface LoggerInterface
{
    public function log(string $message);
}

class FileLogger implements LoggerInterface
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $message)
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

class ConsoleLogger implements LoggerInterface
{
    public function log(string $message)
    {
        echo $message . PHP_EOL;
    }
}

// Create instances of the logging classes
$fileLogger = new FileLogger('logs.txt');
// $consoleLogger = new ConsoleLogger();

// Log messages using the different loggers
$fileLogger->log('This Line Will Add To The txt File');
// $consoleLogger->log('This message will be logged to the console.');



?>