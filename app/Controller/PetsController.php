<?php

namespace App\Controller;

use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
class PetsController extends AbstractController
{
    public function register(RequestInterface $request, ResponseInterface $response)
    {
        $data = $request->all();

        return $response->json([
            'message' => 'pets cadastrado com sucesso!',
        ]);
    }
}