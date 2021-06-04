<?php

declare(strict_types=1);

namespace Trunk\Logger;

use Psr\Log\LogLevel;

class LoggerConfig
{
    /*
     * The active log levels that will create logs, these can be modified in different environments to aid performance.
     */
    public array $activeLogLevels = [
        LogLevel::EMERGENCY => true,
        LogLevel::ALERT => true,
        LogLevel::CRITICAL => true,
        LogLevel::DEBUG => true,
        LogLevel::ERROR => true,
        LogLevel::INFO => true,
        LogLevel::NOTICE => true,
        LogLevel::WARNING => true,
    ];
}