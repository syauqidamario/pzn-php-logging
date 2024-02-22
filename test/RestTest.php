<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\ResettableInterface;
use Monolog\Test\TestCase;

class RestTest extends TestCase
{

      public function testReset()
      {
            $logger = new Logger(RestTest::class);
            $logger->pushHandler(new StreamHandler("php://stderr"));
            $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));
            $logger->pushProcessor(new GitProcessor());
            $logger->pushProcessor(new MemoryUsageProcessor());
            $logger->pushProcessor(new HostnameProcessor());

            for ($i = 0; $i < 50; $i++) {
                  $logger->info("Loop number $i");
                  if ($i % 100 == 0) {
                        $logger->reset();
                  }
            }

            self::assertNotNull($logger);
      }
}
