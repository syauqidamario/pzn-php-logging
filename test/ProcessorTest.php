<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcessorTest extends TestCase
{

      public function testProcessor()
      {
            $logger = new Logger(ProcessorTest::class);
            $logger->pushHandler(new StreamHandler('php:// stderr'));
            $logger->pushProcessor(function ($record) {
                  $record['extra']['pzn'] = [
                        "author" => "Syauqi D. Djohan",
                        "app" => "Learn PHP Logging"
                  ];
                  return $record;
            });
      }

      public function testProcessorMonolog()
      {
            $logger = new Logger(ProcessorTest::class);
            $logger->pushHandler(new StreamHandler('php:// stderr'));
            $logger->pushProcessor(new GitProcessor());
            $logger->pushProcessor(new MemoryUsageProcessor());
            $logger->pushProcessor(function ($record) {
                  $record['extra']['pzn'] = [
                        "author" => "Syauqi D. Djohan",
                        "app" => "Learn PHP Logging"
                  ];
                  return $record;
            });
      }
}
