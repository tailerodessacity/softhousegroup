<?php

namespace src\Logger\Factory;

use src\Logger\Strategy\EmailLogger;
use src\Logger\Strategy\LoggerStrategy;

class EmailFactory implements LoggerStrategyFactoryInterface
{
    public function create(): LoggerStrategy
    {
        return new EmailLogger();
    }
}