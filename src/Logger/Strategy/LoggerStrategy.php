<?php

namespace src\Logger\Strategy;

interface LoggerStrategy
{
    public function send(string $message): void;
}