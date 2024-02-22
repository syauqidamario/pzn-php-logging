<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LevelTest extends TestCase
{
      public function testLevel()
      {
            $logger = new Logger(LevelTest::class);
            $logger->pushHandler(new StreamHandler("php//stderr"));
            $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR));
            $logger->debug("This is a debug");
            $logger->info("This is an info");
            $logger->notice("This is a notice");
            $logger->warning("This is a warning");
            $logger->error("This is an error");
            $logger->critical("This is a critical");
            $logger->alert("This is a alert");
            $logger->emergency("This is an emergency");
            self::assertNotNull($logger);
      }
}
