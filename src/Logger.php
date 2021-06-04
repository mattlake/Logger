<?php

declare(strict_types=1);

namespace Trunk\Logger;

use Psr\Log\LogLevel;

class Logger implements \Psr\Log\LoggerInterface
{
    public function __construct(private LogTypeInterface $logger)
    {
    }

    public function emergency($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function alert($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function critical($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function error($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function warning($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function notice($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function info($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function debug($message, array $context = [])
    {
        // todo Is this log level active?
        $this->logger->emit($message, $context);
    }

    public function log($level, $message, array $context = [])
    {
        switch ($level){
            case LogLevel::EMERGENCY:
                $this->emergency($message, $context);
                break;
            case LogLevel::ALERT:
                $this->alert($message, $context);
                break;
            case LogLevel::CRITICAL:
                $this->critical($message, $context);
                break;
            case LogLevel::ERROR:
                $this->error($message, $context);
                break;
            case LogLevel::WARNING:
                $this->warning($message, $context);
                break;
            case LogLevel::NOTICE:
                $this->notice($message, $context);
                break;
            case LogLevel::INFO:
                $this->info($message, $context);
                break;
            case LogLevel::DEBUG:
                $this->debug($message, $context);
                break;
            default:
                throw new Psr\Log\InvalidArgumentException();

        }
    }
}
