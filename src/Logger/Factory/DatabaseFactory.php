<?php

namespace src\Logger\Factory;

use src\Logger\Strategy\DatabaseLogger;
use src\Logger\Strategy\LoggerStrategy;

class DatabaseFactory implements LoggerStrategyFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(): LoggerStrategy
    {
        return new DatabaseLogger();
    }
}