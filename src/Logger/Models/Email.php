<?php

namespace src\Logger\Models;

class Email implements LoggerStrategy
{
    /**
     * {@inheritDoc}
     */
    public function send(string $message): string
    {
        mail(Yii::$app->logger['defaultLoggerType'], 'Log Message', $message);
        return 'was sent via email';
    }
}