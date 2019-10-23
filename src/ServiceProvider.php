<?php

namespace Geraintp\LaravelResponseTap;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../config/responsetap.php' => config_path('responsetap.php'),
		], 'config');
	}

	/**
	 * Register bindings in the container.
	 */
	public function register()
	{
		$this->app->singleton(ResponseTap::class, function ($app) {
			return new ResponseTap(config('responsetap'));
		});

		$this->app->alias('ResponseTap', \Geraintp\LaravelResponseTap\Facades\ResponseTap::class);
	}
}
