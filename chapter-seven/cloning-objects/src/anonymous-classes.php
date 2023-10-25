<?php

require_once '../vendor/autoload.php';

interface Logger
{
    public function log(string $text);
}

class AppErrorHandler
{
    public function __construct(private Logger $logger) {}

    public function getLogger(): Logger
    {
        return $this->logger;
    }
}

$logger = new class implements Logger {
    public function log(string $text)
    {
        print $text;
    }
};

$appErrorHandler = new AppErrorHandler($logger);

$appErrorHandler->getLogger()->log('Logging an example error message' . PHP_EOL);










