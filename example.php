<?php

declare(strict_types=1);

use Trunk\Logger\Logger;
use Trunk\Logger\LoggerStream;

require_once __DIR__ . '/vendor/autoload.php';

// Instantiate logger
$logger = new Logger();
$logger->addLog(new LoggerStream('log.txt'));
$logger->addLog(new LoggerStream('log2.txt'));

$logger->emergency('This is an emergeency!!!');
