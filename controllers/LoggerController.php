<?php

namespace app\controllers;

use src\Logger\ConstantBag\Type;
use src\Logger\LoggerInterface;
use Yii;
use yii\web\Controller;

class LoggerController extends Controller
{
    private $logger;

    public function __construct($id, $module, LoggerInterface $logger, array $config = [])
    {
        $this->logger = $logger;
        parent::__construct($id, $module, $config);
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