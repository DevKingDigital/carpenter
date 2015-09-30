<?php

namespace Michaeljennings\Carpenter\Tests;

use Michaeljennings\Carpenter\Carpenter;
use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
	public function __construct()
    {
        // Fixes error with session_start() and phpunit
        ob_start();
    }

    public function setUp()
    {
        // Fixes issues with session_start and phpunit
        @session_start();
    }

	protected function makeCarpenter()
    {
        $config = $this->getConfig();

        return new Carpenter($config);
    }

    protected function makeTable()
    {
        $carpenter = $this->makeCarpenter();

        return $carpenter->make('test', function ($table) {});
    }

    protected function getData()
    {
        return [
            [
                'test' => 'Test',
                'foo' => 'Test 1',
                'baz' => 'Test 2',
            ],
            [
                'test' => 'Test 3',
                'foo' => 'Test 4',
                'baz' => 'Test 5',
            ],
            [
                'test' => 'Test 6',
                'foo' => 'Test 7',
                'baz' => 'Test 8',
            ],
        ];
    }

    protected function getConfig()
    {
        return require __DIR__ . '/../config/config.php';
    }
}