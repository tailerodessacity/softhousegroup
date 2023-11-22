<?php

namespace src\Logger\ConstantBag;

class Type
{
    const DATABASE_LOGGER_TYPE = 'database';

    const EMAIL_LOGGER_TYPE = 'email';

    const FILE_LOGGER_TYPE = 'file';

    /**
     * Get all types
     *
     * @return string[]
     */
    public static function getAllTypes(): array
    {
        return [
            self::DATABASE_LOGGER_TYPE,
            self::EMAIL_LOGGER_TYPE,
            self::FILE_LOGGER_TYPE,
        ];
    }

}