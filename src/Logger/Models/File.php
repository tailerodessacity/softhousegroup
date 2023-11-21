<?php

namespace src\Logger\Models;

class File implements LoggerStrategy
{
    private $filePath = '/path/to/file';

    /**
     * {@inheritDoc}
     */
    public function send(string $message): string
    {
        file_put_contents(__DIR__ . $this->filePath, $message . PHP_EOL, FILE_APPEND);

        return 'was sent via file';
    }
}