<?php

declare(strict_types=1);

namespace Trunk\Logger;

use Psr\Log\LogLevel;

class Logger implements \Psr\Log\LoggerInterface
{
    public array $logs = [];
    public array $customLogs = [];

    public function __construct()
    {
    }

    public function addLog(LogTypeInterface $log): self
    {
        $this->logs[] = $log;
        return $this;
    }

    public function emergency($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }

        $this->handleCustomLogs(LogLevel::EMERGENCY);
    }

    public function alert($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function critical($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function error($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function warning($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function notice($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function info($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function debug($message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        foreach ($this->logs as $log) {
            $log->emit($message, $context);
        }
    }

    public function log($level, $message, array $context = []): void
    {
        $message = $this->validateMessage($message, $context);
        switch ($level) {
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
                throw new \Psr\Log\InvalidArgumentException();
        }
    }

    public function addCustomLog(string $logLevel, callable $closure): self
    {
        $this->customLogs[$logLevel][] = $closure;
        return $this;
    }

    private function handleCustomLogs(string $logLevel)
    {
        if (isset($this->customLogs[$logLevel])) {
            foreach ($this->customLogs[$logLevel] as $callable) {
                call_user_func($callable);
            }
        }
    }

    private function validateMessage($message, array $context = []): string
    {
        if (is_array($message) || (is_object($message) && !method_exists($message, '__toString'))) {
            throw new \Exception('Message must be a string, or an object with a __toString() method');
        }

        if (count($context) > 0) {
            $message = $this->interpolate($message, $context);
        }

        return (string)$message;
    }

    private function interpolate(string $message, array $context = []): string
    {
        $replace = [];

        foreach ($context as $key => $val) {

            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        return strtr($message, $replace);
    }
}
