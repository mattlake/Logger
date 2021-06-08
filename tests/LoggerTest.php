<?php

use Trunk\Logger\Logger;
use Trunk\Logger\LoggerStream;

it('can be instantiated', function () {
    $this->assertInstanceOf(Logger::class, new Logger());
});

it('cam add a custom closure', function () {
    $logger = new Logger();
    $logger->addCustomLog('emergency', function () {
        return 'this is a custom log';
    });

    $this->assertCount(1, $logger->customLogs);
    $this->assertArrayHasKey('emergency', $logger->customLogs);
});
