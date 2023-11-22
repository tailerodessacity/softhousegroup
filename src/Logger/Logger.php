<?php

namespace src\Logger;

use src\Logger\ConstantBag\Type;
use src\Logger\Factory\DatabaseLoggerFactory;
use src\Logger\Factory\EmailLoggerFactory;
use src\Logger\Factory\FileLoggerFactory;

class Logger implements LoggerInterface
{
    private $type;

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        $logger = $this->getLoggerByType($this->getType());
        $logger->send($message);
    }

    /**
     * {@inheritDoc}
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $logger = $this->getLoggerByType($loggerType);
        $logger->send($message);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getLoggerByType(string $type): Models\LoggerStrategy
    {
        $logger = null;

        switch ($type) {
            case Type::EMAIL_LOGGER_TYPE:
                $logger = new EmailLoggerFactory();
                break;
            case Type::DATABASE_LOGGER_TYPE:
                $logger = new DatabaseLoggerFactory();
                break;
            case Type::FILE_LOGGER_TYPE:
                $logger = new FileLoggerFactory();
                break;
            default:
                throw new \InvalidArgumentException("Unsupported logger type: $type");
        }

        return $logger->create();
    }
}