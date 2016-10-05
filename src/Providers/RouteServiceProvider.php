<?php

namespace TypiCMS\Modules\Translations\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Translations\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return null
     */
    public function map()
    {
        Route::group(['namespace' => $this->namespace], function (Router $router) {
            /*
             * Admin routes
             */
            $router->group(['middleware' => 'admin', 'prefix' => 'admin'], function (Router $router) {
                $router->get('translations', 'AdminController@index')->name('admin::index-translations');
                $router->get('translations/create', 'AdminController@create')->name('admin::create-translation');
                $router->get('translations/{translation}/edit', 'AdminController@edit')->name('admin::edit-translation');
                $router->post('translations', 'AdminController@store')->name('admin::store-translation');
                $router->put('translations/{translation}', 'AdminController@update')->name('admin::update-translation');
                $router->patch('translations/{translation}', 'AdminController@ajaxUpdate');
                $router->delete('translations/{translation}', 'AdminController@destroy')->name('admin::destroy-translation');
            });
        });
    }
}
