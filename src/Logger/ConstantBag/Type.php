<?php

namespace src\Logger\ConstantBag;

use src\Logger\Models\Database;
use src\Logger\Models\Email;
use src\Logger\Models\File;

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