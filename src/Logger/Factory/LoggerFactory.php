<?php

namespace src\Logger\Factory;

use src\Logger\Models\LoggerStrategy;

abstract class LoggerFactory
{
    abstract public function create(): LoggerStrategy;
}