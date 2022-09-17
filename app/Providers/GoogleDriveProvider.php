<?php

namespace App\Providers;

use Google\Service\AdExchangeBuyerII\Client;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class GoogleDriveProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // \Storage::extends('goggle', function($app, $config){
            // $client = new
            // dd($client);
            // $client->setClientId($config['CLIENT_ID']);
            // $client->setClientSecret($config['CLIENT_SECRET']);
            // $client->refreshToken($config['TOKEN_ID']);
            // $service = new \Goggle_Service_Driver($client);
            // $adapter = new GoggleDriveAdapter($service, $config);
            // dd($adapter);
            // return new Filesystem($adapter);
        // });
    }
}
