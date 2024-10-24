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
    Router::get('',[PetsController::class, 'index']);  //lista todos
    Router::get('/{id}',[PetsController::class, 'show']);  //lista um em especifico
    Router::post('',[PetsController::class, 'store']); //cadastro de pets
    Router::put('/{id}',[PetsController::class, 'update']);
    Router::delete('/{id}',[\App\Controller\PetsController::class, 'destroy']);
});



