<?php

namespace src\Logger\Models;

interface LoggerStrategy
{
    public function send(string $message): string;
}