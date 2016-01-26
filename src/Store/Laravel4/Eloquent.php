<?php

namespace Michaeljennings\Carpenter\Store\Laravel4;

use Michaeljennings\Carpenter\Contracts\Store;
use Michaeljennings\Carpenter\Exceptions\ModelNotSetException;
use Michaeljennings\Carpenter\Store\Eloquent as Laravel5Store;

class Eloquent extends Laravel5Store implements Store
{
    /**
     * An instance of the IOC container.
     *
     * @var mixed
     */
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Return the total results of the query.
     *
     * @return integer
     * @throws ModelNotSetException
     */
    public function count()
    {
        if ( ! $this->model) {
            throw new ModelNotSetException('You must set a model to be used by the eloquent driver.');
        }

        $model = clone $this->model;

        return $model->paginate(1, $this->select)->getTotal();
    }

    /**
     * Return a paginated list of results.
     *
     * @param int|string $amount
     * @param int|string $page
     * @param int|string $perPage
     * @return array
     * @throws ModelNotSetException
     */
    public function paginate($amount, $page, $perPage)
    {
        if ( ! $this->model) {
            throw new ModelNotSetException('You must set a model to be used by the eloquent driver.');
        }

        $this->app['paginator']->setPageName($this->key);

        return $this->model->paginate($amount, $this->select)->all();
    }
}