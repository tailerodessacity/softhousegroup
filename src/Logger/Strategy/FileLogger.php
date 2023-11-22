<?php

namespace src\Logger\Strategy;

class FileLogger implements LoggerStrategy
{
    private $filePath = '../runtime/logs/logger.log';

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}