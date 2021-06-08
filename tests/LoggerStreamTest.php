<?php

use Trunk\Logger\Logger;
use Trunk\Logger\LoggerStream;

it('can add stream logger', function () {
    $logger = new Logger();
    $logger->addLog(new LoggerStream('test-log.txt'));

    $this->assertCount(1, $logger->logs);
});

it('can write to logger stream file', function () {
    $logFile = __DIR__ . '/test-log.txt';
    $logger = new Logger();
    $logger->addLog(new LoggerStream($logFile));

    $logger->emergency('emergency test');

    $this->assertTrue(file_exists($logFile));
    unlink($logFile);
});

it('appends log to end of logfile', function () {
    $logFile = __DIR__ . '/test-log2.txt';
    $logger = new Logger();
    $logger->addLog(new LoggerStream($logFile));

    $logger->emergency('emergency test');

    $this->assertSame('emergency test', trim(file_get_contents($logFile)));
    unlink($logFile);
});
