<?php

namespace App\Controller;

use App\Model\Pet;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
class PetsController extends AbstractController
{
    public function register(RequestInterface $request, ResponseInterface $response)
    {
        $data = $request->all();


//valida os dados

        if(empty($data['nome']) || empty($data['data_nascimento'])){
            return $response->json([
                'error' => 'invalid data'
            ], 400);
        }

//insere dados no banco

        $pets = Pet::create([
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento'],
        ]);

//retorna a resposta com sucesso

        return $response->json([
            'message' => 'pets cadastrado com sucesso!',
            'pets' => $pets
        ]);
    }
    public function list(RequestInterface $request, ResponseInterface $response)
    {
        $pets =  Pet::all();

        if ($pets->isEmpty()){
            return $response->json([
                'message' => 'pets não encontrado',
                'data' => [],
            ]);
        }


        return $response->json([
            'message' => 'pet listado com sucesso!',
            'data' =>$pets,
        ]);
    }

    public function delete(RequestInterface $request, ResponseInterface $response)
    {
        //$data = $request->all();

        $id = $request->input('id');

        $pet = Pet::find($id);

        if($pet){
            $pet->delete();

            return $response -> json([
                'message' => 'Pet removido com sucesso!'
            ]);
        }
            return $response -> json([
                'message' => 'Pet não encontrado!'
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