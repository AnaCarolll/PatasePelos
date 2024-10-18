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
    public function list(RequestInterface $request, ResponseInterface $response)
    {
        $data = $request->all();

        return $response->json([
            'message' => 'pet listado com sucesso!',
        ]);
    }

    public function delete(RequestInterface $request, ResponseInterface $response)
    {
        $data = $request->all();

        return $response->json([
            'message' => 'pet removido com sucesso!',
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response)
    {
        $data = $request -> all();

        return $response ->json([
            'message' => 'pet atualizado com sucesso!',
        ]);
    }
}