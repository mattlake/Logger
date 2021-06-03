<?php

declare(strict_types=1);

namespace Trunk\Logger;

use Psr\Log\LogLevel;

class Logger extends \Psr\Log\AbstractLogger implements \Psr\Log\LoggerInterface
{
    public function __construct(private LogTypeInterface $logger)
    {
    }

    public function log($level, $message, array $context = array())
    {
        $m = $level . ' >> ' . $message;
        $this->logger->write($m);
    }
}
