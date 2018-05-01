<?php

namespace Client\Webapp;

use Silex\Application;

class RoutesLoader
{
    private $app;

    /**
     * 
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['surveys.controller'] = function() {
            return new Controllers\SurveysController($this->app['surveys.service']);
        };
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/surveys/{type}/{code}', "surveys.controller:getSurvey");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

