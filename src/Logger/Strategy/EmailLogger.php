<?php

namespace src\Logger\Strategy;

use Yii;

class EmailLogger implements LoggerStrategy
{
    /**
     * {@inheritDoc}
     */
    public function send(string $message): void
    {
        mail(Yii::$app->get('loggerSettings')->defaultLoggerType, 'Log Message', $message);
    }

}