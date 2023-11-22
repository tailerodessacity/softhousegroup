<?php

namespace app\controllers;

use src\Logger\ConstantBag\Type;
use src\Logger\LoggerInterface;
use yii\web\Controller;

class LoggerController extends Controller
{
    private $logger;

    private $loggerFactory;

    /**
     * LoggerController construct
     *
     * @param $id
     * @param $module
     * @param LoggerInterface $logger
     * @param array $config
     */
    public function __construct($id, $module, LoggerInterface $logger, array $config = [])
    {
        $this->logger = $logger;
        parent::__construct($id, $module, $config);
    }

    /**
     * Sends a log message to the default logger.
     */
    public function actionLog()
    {
        $this->logger->setType(TYPE::EMAIL_LOGGER_TYPE);
        $message = 'Sends a log message to email';
        $this->logger->send($message);

        $this->asJson('ok');
    }

    /**
     * Sends a log message to a special logger.
     *
     * @param string $type
     */
    public function actionLogTo(string $type)
    {
        $this->logger->setType($type);
        $message = 'Sends a log message to a special logger';
        $this->logger->send($message);

        $this->asJson('ok');

    }

    /**
     * Sends a log message to all loggers.
     */
    public function actionLogToAll()
    {
        $message = 'Sends a log message to all loggers.';

        foreach (Type::getAllTypes() as $type) {
            $this->logger->setType($type);
            $this->logger->send($message);
        }

        $this->asJson('ok');
    }
}