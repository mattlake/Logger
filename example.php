<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

// Instantiate logger
$logger = new \Trunk\Logger\Logger(new \Trunk\Logger\LoggerStream('log.txt'));

// Log Message
$logger->emergency('Log my emergency!');
$logger->alert('Log my alert!');
$logger->critical('Log my critical!');
$logger->error('Log my error!');
$logger->info('Log my info!');
$logger->debug('Log my debug!');
$logger->notice('Log my notice!');
