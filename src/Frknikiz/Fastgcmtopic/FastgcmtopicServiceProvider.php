<?php namespace Frknikiz\Fastgcmtopic;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class FastgcmtopicServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('frknikiz/fastgcmtopic');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app['fastgcmtopic'] = $this->app->share(function ($app) {
			return new FastGcmTopic;
		});
		$this->app->booting(function() {
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('FastGcmTopic', 'Frknikiz\Fastgcmtopic\Facades\FastGcmTopic');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array("fastgcmtopic");
	}

}
