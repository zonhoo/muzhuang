<?php namespace Lvdingtao\Weibo;

use Illuminate\Support\ServiceProvider;

class WeiboServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */


	public function register()
	{
		//
        $this->app->singleton('weibo', function($app)
        {
            return new WeiboOAuth($app['config']->get('services.weibo.client_id'), $app['config']->get('services.weibo.client_secret'));
        });

        //$this->app->alias('weibo', 'Lvdingtao\Weibo\WeiboOAuth');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['weibo'];
	}

}
