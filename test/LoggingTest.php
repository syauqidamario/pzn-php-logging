<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggingTest extends TestCase
{
      public function testLogging()
      {
            $logger = new Logger(LoggingTest::class);
            $logger->pushHandler(new StreamHandler("php://stderr"));
            $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));
            $logger->info("Good luck learning PHP logging");
            $logger->info("Hello there");
            self::assertNotNull($logger);
      }
}
