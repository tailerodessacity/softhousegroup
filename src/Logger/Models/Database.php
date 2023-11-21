<?php

namespace src\Logger\Models;

use yii\db\Connection;

class Database implements LoggerStrategy
{
    /**
     * @var Connection
     */
    private $connection;

    private $table = 'log';

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $message): string
    {
       $this->connection->createCommand()
            ->insert($this->table, ['message' => $message])
            ->execute();

        return 'was sent via db';
    }
}