<?php

namespace src\Logger\Factory;

use src\Logger\ConstantBag\Type;
use src\Logger\Models\Database;
use src\Logger\Models\Email;
use src\Logger\Models\File;
use src\Logger\Models\LoggerStrategy;
use yii\db\Connection;

class LoggerFactory implements LoggerFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(string $type): LoggerStrategy
    {
        switch ($type) {
            case Type::EMAIL_LOGGER_TYPE :
               return new Email();
            case Type::DATABASE_LOGGER_TYPE :
                return new Database(new Connection());
            case Type::FILE_LOGGER_TYPE :
                return new File();
            default:
                throw new \InvalidArgumentException("Unsupported logger type: $type");
        }
    }
}