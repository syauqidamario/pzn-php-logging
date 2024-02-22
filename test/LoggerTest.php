<?php

use Monolog\Logger;

class LoggerTest extends \PHPUnit\Framework\TestCase
{
      public function testLogger()
      {
            $logger = new Logger("Syauqi");
            self::assertNotNull($logger);
      }

      public function testLoggerWithName()
      {
            $logger = new Logger(LoggerTest::class);
            self::assertNotNull($logger);
      }
}
