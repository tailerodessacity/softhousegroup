<?php

namespace src\Logger\Controller;

use src\Logger\ConstantBag\Type;
use src\Logger\LoggerInterface;
use yii\web\Controller;

class LoggerController extends Controller
{
    private $logger;

    public function __invoke(): void
    {
        $this->logger =  \Yii::$container->get(LoggerInterface::class);
    }

    /**
     * Sends a log message to the default logger.
     *
     */
    public function log()
    {
        $this->logger->setType(Type::EMAIL_LOGGER_TYPE);
        $message = 'Sends a log message to email';
        $this->logger->send($message);
    }

    /**
     * Sends a log message to a special logger.
     *
     * @param string $type
     */
    public function logTo(string $type)
    {
        $message = 'Sends a log message to a special logger';
        $this->logger->sendByLogger($message, $type);
    }

    /**
     * Sends a log message to all loggers.
     */
    public function logToAll()
    {
        $message = 'Sends a log message to all loggers.';
        foreach (Type::getAllTypes() as $type) {
           $this->logger->sendByLogger($message, $type);
        }
    }
}