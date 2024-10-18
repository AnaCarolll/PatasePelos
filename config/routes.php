<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

//Router::addRoute(['POST'], '/registro', 'App\Controller\PetsController@register');

Router::addGroup('/pet/', function (){
    Router::post('registro','App\Controller\PetsController@register');
    Router::get('listagem','App\Controller\PetsController@list');
    Router::delete('deletar','App\Controller\PetsController@delete');
    Router::put('ataulizar','App\Controller\PetsController@update');
});




//Router::get('/favicon.ico', function () {
//    return 'aopa';
//});
