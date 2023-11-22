<?php

namespace src\Logger\Factory;

use src\Logger\Strategy\DatabaseLogger;
use src\Logger\Strategy\LoggerStrategy;

class DatabaseFactory implements LoggerStrategyFactoryInterface
{
    public function create(): LoggerStrategy
    {
        return new DatabaseLogger();
    }
}