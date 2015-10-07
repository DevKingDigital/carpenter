<?php

namespace Michaeljennings\Carpenter\Tests\Store;

use Michaeljennings\Carpenter\Store\EloquentStore;
use Michaeljennings\Carpenter\Tests\TestCase;

class EloquentStoreTest extends TestCase
{
    public function testEloquentStoreImplementsContract()
    {
        $store = $this->makeStore();

        $this->assertInstanceOf('Michaeljennings\Carpenter\Contracts\Store', $store);
    }

    public function testModelCanBeSet()
    {
        $store = $this->makeStore();

        $this->assertNull($store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel'));
    }

    public function testColumnsCanBeSet()
    {
        $store = $this->makeStore();

        $this->assertNull($store->select(['foo', 'bar']));
    }

    public function testResultsReturnsAnArray()
    {
        $store = $this->makeStore();

        $store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel');
        $this->assertInternalType('array', $store->results());
    }

    public function testCountReturnsTotalResults()
    {
        $store = $this->makeStore();

        $store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel');
        $this->assertEquals(0, $store->count());
    }

    public function testPaginateReturnsAnArray()
    {
        $store = $this->makeStore();

        $store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel');
        $this->assertInternalType('array', $store->paginate(10, 1, 5));
    }

    public function testRefreshOrderByReturnsInstance()
    {
        $store = $this->makeStore();

        $store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel');
        $this->assertInstanceOf('Michaeljennings\Carpenter\Store\EloquentStore', $store->refreshOrderBy());
    }

    public function testOrderByReturnsInstance()
    {
        $store = $this->makeStore();

        $store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel');
        $this->assertInstanceOf('Michaeljennings\Carpenter\Store\EloquentStore', $store->orderBy('foo', 'desc'));
    }

    public function testModelMethodsCanBeRunOnTheQuery()
    {
        $store = $this->makeStore();

        $store->model('Michaeljennings\Carpenter\Tests\Store\ExampleEloquentModel');
        $this->assertInstanceOf('Michaeljennings\Carpenter\Store\EloquentStore', $store->foo());
    }

    public function makeStore()
    {
        return new EloquentStore();
    }
}