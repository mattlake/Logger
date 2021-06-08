<?php

declare(strict_types=1);

use Psr\Log\LogLevel;
use Trunk\Logger\Logger;
use Trunk\Logger\LoggerStream;

require_once __DIR__ . '/vendor/autoload.php';

// Instantiate logger
$logger = new Logger();
$logger->addLog(new LoggerStream(filepath: 'log.txt'));
$logger->addLog(new LoggerStream(filepath: 'log2.txt'));

$logger->addCustomLog(LogLevel::EMERGENCY, function () {
    $test = 'Test Text';
    echo $test;
});

$logger->emergency('This is an emergeency!!!');
