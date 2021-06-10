<?php

require_once __DIR__ . '/TestClass.php';

use Trunk\Logger\Logger;
use Trunk\Logger\LoggerStream;

it('can be instantiated', function () {
    $this->assertInstanceOf(Logger::class, new Logger());
});

it('cam add a custom closure', function () {
    $logger = new Logger();
    $logger->addCustomLog('emergency', function () {
        echo 'this is a custom log';
    });

    $this->assertCount(1, $logger->customLogs);
    $this->assertArrayHasKey('emergency', $logger->customLogs);
});

it('throws an exception if the message is an array', function () {
    $logger = new Logger();
    $logFile = './testlog.txt';
    $logger->addLog(new LoggerStream($logFile));

    $this->expectException(\Exception::class);
    $logger->emergency(array());
    unlink($logFile);
});

it('throws an exception if the message is an object without a __toString method', function () {
    $logger = new Logger();
    $logFile = './testlog.txt';
    $logger->addLog(new LoggerStream($logFile));

    $testClass = new stdClass();
    $this->expectException(\Exception::class);
    $logger->emergency($testClass);
    unlink($logFile);
});

it('logs correctly if object with __toString method is passed as an argument', function () {
    $logger = new Logger();
    $logFile = './testlog.txt';
    $logger->addLog(new LoggerStream($logFile));
    $testClass = new TestClass();
    $logger->emergency($testClass);
    $this->assertTrue(file_exists($logFile));
    unlink($logFile);
});
