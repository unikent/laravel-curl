<?php namespace Unikent\Curl\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Curl extends BaseFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'curl';
    }

}