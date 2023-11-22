<?php

namespace src\Logger\Factory;

use src\Logger\Strategy\LoggerStrategy;

interface LoggerStrategyFactoryInterface
{
    /**
     * Create logger by type
     */
    public function create(): LoggerStrategy;
}