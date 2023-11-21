<?php

namespace src\Logger;

use src\Logger\Factory\LoggerFactoryInterface;

class Logger implements LoggerInterface
{
    private $type;

    private $loggerFactory;

    public function __construct(LoggerFactoryInterface $loggerFactory)
    {
        $this->loggerFactory = $loggerFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        $model = $this->loggerFactory->create($this->getType());
        $model->send($message);
    }

    /**
     * {@inheritDoc}
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $model = $this->loggerFactory->create($loggerType);
        $model->send($message);
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
}