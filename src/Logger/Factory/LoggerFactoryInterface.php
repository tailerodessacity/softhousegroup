<?php

namespace src\Logger\Factory;

use src\Logger\Models\LoggerStrategy;

interface LoggerFactoryInterface
{
    /**
     * Create logger from type
     *
     * @param string $loggerType
     * @return LoggerStrategy
     */
    public function create(string $type): LoggerStrategy;
}