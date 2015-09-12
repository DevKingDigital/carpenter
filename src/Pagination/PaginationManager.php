<?php

namespace Michaeljennings\Carpenter\Pagination;

use Michaeljennings\Carpenter\Nexus\Manager;
use Michaeljennings\Carpenter\View\ViewManager;

class PaginationManager extends Manager
{
    /**
     * An instance of the carpenter view manager.
     *
     * @var ViewManager
     */
    protected $view;

    /**
     * Create the illuminate pagination driver.
     *
     * @return IlluminateDriver
     */
    public function createIlluminateDriver()
    {
        return new IlluminateDriver(app());
    }

    /**
     * Create the laravel 4 pagination driver.
     *
     * @return Laravel4\IlluminateDriver
     */
    public function createLaravel4Driver()
    {
        return new Laravel4\IlluminateDriver(app());
    }

    /**
     * Create the native pagination driver.
     *
     * @return Native
     */
    public function createNativeDriver()
    {
        return new Native();
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config['paginator']['driver'];
    }
} 