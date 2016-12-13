<?php

namespace Froiden\SqlGenerator\Providers;

use Froiden\SqlGenerator\Console\SqlCommand;
use Illuminate\Support\ServiceProvider;

class SqlGeneratorServiceProvider extends ServiceProvider
{
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
        $this->registerCommands();
    }

    /**
     * Register all of sql generator command.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands('command.generate.sql');

        $this->registerInstallCommand();
    }

    /**
     * @return void
     */
    protected function registerInstallCommand()
    {
        $this->app->singleton('command.generate.sql', function($app) {

            return new SqlCommand();
        });
    }

    /**
     * @return void
     */
    public function provides()
    {
        return [
            'command.generate.sql'
        ];
    }
}
