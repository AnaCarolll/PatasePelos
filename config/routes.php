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

use App\Controller\PetsController;
use Hyperf\HttpServer\Router\Router;

Router::addGroup('/pet', function (){
    Router::get('','App\Controller\PetsController@list');  //lista todos
    Router::get('/{id}','App\Controller\PetsController@list');  //lista um em especifico
    Router::post('','App\Controller\PetsController@register');
    Router::put('/{id}',[PetsController::class, 'update']);
    Router::delete('/{id}',[\App\Controller\PetsController::class, 'destroy']);
});



