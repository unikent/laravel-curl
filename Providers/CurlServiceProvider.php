<?php namespace Unikent\Curl\Providers;

use Illuminate\Support\ServiceProvider;
use Unikent\Curl\Curl;
use Illuminate\Support\Facades\App;

class CurlServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        App::bind('curl', function()
        {
            return new Curl();
        });
	}

}
