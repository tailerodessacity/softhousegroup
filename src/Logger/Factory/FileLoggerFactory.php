<?php

namespace src\Logger\Factory;

use src\Logger\Models\Database;
use src\Logger\Models\File;
use src\Logger\Models\LoggerStrategy;
use yii\db\Connection;

class FileLoggerFactory extends LoggerFactory
{
    public function create(): LoggerStrategy
    {
        return new File();
    }
}