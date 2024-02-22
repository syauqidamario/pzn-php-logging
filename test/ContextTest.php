<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class ContextTest extends TestCase
{
      public function testContext()
      {
            $logger = new Logger(ContextTest::class);
            $logger->pushHandler(new StreamHandler("php://stderr"));
            $logger->info("Request user login", ["username" => "syauqi"]);
            $logger->info("Success login", ["username" => "syauqi"]);
            self::assertNotNull($logger);
      }
}
