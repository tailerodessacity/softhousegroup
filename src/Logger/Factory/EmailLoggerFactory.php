<?php

namespace src\Logger\Factory;

use src\Logger\Models\Email;
use src\Logger\Models\LoggerStrategy;

class EmailLoggerFactory extends LoggerFactory
{
    public function create(): LoggerStrategy
    {
        return new Email();
    }
}