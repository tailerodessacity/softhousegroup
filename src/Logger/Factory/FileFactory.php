<?php

namespace src\Logger\Factory;

use src\Logger\Strategy\FileLogger;
use src\Logger\Strategy\LoggerStrategy;

class FileFactory implements LoggerStrategyFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(): LoggerStrategy
    {
        return new FileLogger();
    }
}