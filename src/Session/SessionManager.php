<?php

namespace Michaeljennings\Carpenter\Session;

use Michaeljennings\Carpenter\Nexus\Manager;

class SessionManager extends Manager
{
    /**
     * Return a new instance of the native php session driver.
     *
     * @return Michaeljennings\Carpenter\Session\NativeDriver
     */
    public function createNativeDriver()
    {
        return new NativeDriver($this->config);
    }

    /**
     * Return a new instance of the illuminate driver.
     *
     * @return Michaeljennings\Carpenter\Session\IlluminateDriver
     */
    public function createIlluminateDriver()
    {
        return new IlluminateDriver(app()['session']->driver());
    }

    /**
     * Return a new instance of the codeigniter driver.
     *
     * @return \Michaeljennings\Carpenter\Session\CodeigniterDriver
     */
    public function createCodeigniterDriver()
    {
        return new CodeigniterDriver();
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config['session']['driver'];
    }
} 