<?php

declare(strict_types=1);

namespace Trunk\Logger;

class LoggerStream implements LogTypeInterface
{

    public function __construct(public string $filepath)
    {
    }

    public function emit($message, $context): void
    {
        $stream = fopen($this->filepath, 'a');

        if (!$stream) {
            throw new \Exception('Could not open stream');
        }

        fwrite($stream, $message . PHP_EOL);
        fclose($stream);
    }
}
