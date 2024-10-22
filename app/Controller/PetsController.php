<?php

namespace App\Controller;

use App\Model\Pet;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Paginator\Paginator;
class PetsController extends AbstractController
{
    public function register()
    {
        $data = $this->request->all();
        //valida os dados

        if(empty($data['nome']) || empty($data['data_nascimento'])){
            return $this->response->json([
                'error' => 'invalid data'
            ], 400);
        }

        //insere dados no banco

        $pets = Pet::create([
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento'],
        ]);

        //retorna a resposta com sucesso

        return $this->response->json([
            'message'=>'pets cadastrado com sucesso!',
            'pets'=>$pets
        ]);
    }

    public function list()
    {
        $pets =  Pet::all();
        $pets = Pet::paginate(10);

        if ($pets->isEmpty()){
            return $this->response->json([
                'message'=>'pets não encontrado',
                'data'=>[],
            ]);
        }

        return $this->response->json([
            'message'=>'pet listado com sucesso!',
            'data'=>$pets,
        ]);
    }

    public function delete()
    {
        //$data = $request->all();

        $id =$this->request->input('id');

        $pet = Pet::find($id);

        if($pet){
            $pet->delete();

            return $this->response->json([
                'message'=>'Pet removido com sucesso!'
            ]);
        }
            return $this->response->json([
                'message'=>'Pet não encontrado!'
            ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, $id)
    {

        $data = $request->all();

        $pet = Pet::find($id);

        if(!$pet){
            return $response->json([
                'menssage'=>'O pet não foi encontrado!',
            ]);
        }

        $pet->nome = $data['nome']?? $pet -> nome;
        $pet->data_nascimento = $data['data_nascimento']?? $pet -> data_nascimento;

        $pet->save();


      return $response->json([
           'message'=>'pet atualizado com sucesso!',
          'data'=>$pet,

       ]);
    }
}