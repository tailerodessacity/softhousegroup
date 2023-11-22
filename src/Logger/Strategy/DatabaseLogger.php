<?php

namespace src\Logger\Strategy;

use yii\db\ActiveRecord;

class DatabaseLogger extends ActiveRecord implements LoggerStrategy
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'logs';
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        $this->message = $message;

        $this->save();
    }
}