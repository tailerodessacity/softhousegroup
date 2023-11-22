<?php

namespace src\Logger;

use src\Logger\Factory\LoggerStrategyFactory;

class Logger implements LoggerInterface
{
    private $type;

    private $strategy;

    public function __construct(private readonly LoggerStrategyFactory $loggerStrategyFactory)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        $this->strategy->send($message);
    }

    /**
     * {@inheritDoc}
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->setType($loggerType);
        $this->send($message);
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
        $this->strategy = $this->loggerStrategyFactory->getByType($type);
        $this->type = $type;
    }
}