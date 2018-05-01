<?php

namespace Client\Webapp;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    /**
     * 
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['surveys.service'] = function() {
            return new Services\SurveysService();
        };
    }
}

