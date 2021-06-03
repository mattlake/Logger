<?php

declare(strict_types=1);

namespace Trunk\Logger;

interface LogTypeInterface
{
    public function __construct(string $parameter);
    public function write(string $message);
}
