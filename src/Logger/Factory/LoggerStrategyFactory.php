<?php

namespace src\Logger\Factory;

use src\Logger\ConstantBag\Type;
use src\Logger\Strategy\LoggerStrategy;

class LoggerStrategyFactory
{
    /**
     * {@inheritDoc}
     */
    public function getByType(string $type): LoggerStrategy
    {
        $factory = match ($type) {
            Type::EMAIL_LOGGER_TYPE => new EmailFactory(),
            Type::DATABASE_LOGGER_TYPE => new DatabaseFactory(),
            Type::FILE_LOGGER_TYPE => new FileFactory(),
            default => throw new \InvalidArgumentException("Unsupported logger type: $type"),
        };

        return $factory->create();
    }
}