<?php

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class RotatingFileTest extends TestCase
{
      public function testRotating()
      {
            $logger = new Logger(RotatingFileTest::class);
            $logger->pushHandler(new StreamHandler("php://stderr"));
            $logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../app.log', 10, Logger::INFO));

            $logger->info("Learn PHP");
            $logger->info("Learn PHP OOP");
            $logger->info("Learn PHP Web");
            $logger->info("Learn PHP Database");

            self::assertNotNull($logger);
      }
}
