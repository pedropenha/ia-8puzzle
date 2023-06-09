<?php

namespace App\Controller;

use App\Services\BuscaEmProfundidade;
use App\Services\HttpResponse;
use App\Services\Util;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\Puzzle;

final class PuzzleController extends Controller
{

    public function gera_8_puzzle(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            $data = $request->getParsedBody();

            $puzzle = new Puzzle(0, 0, 0, $data['estadoFinal'], "");

            $this->embaralhar($puzzle);

            $this->comparaPecasForaLugar($puzzle);

            $puzzle->setF();

            return HttpResponse::status200($puzzle);
        }, $request, $response, $args);
    }

    public function embaralha(Request $request, Response $response, array $args){
        return $this->encapsular_response(function($request, $response, $args){
            $data = $request->getParsedBody();
            $puzzle = new Puzzle($data['geracao'], $data['pecasForaLugar'], $data['f'], $data['estadoFinal'], $data['embaralhado']);

            $embaralhado = $data['embaralhado'];

            while($embaralhado === $puzzle->embaralhado){
                $embaralhou = $this->embaralhar($puzzle);
            }

            if(!$embaralhou)
                return HttpResponse::status500();

            return HttpResponse::status200($puzzle);
        }, $request, $response, $args);
    }

    public function resolve_8_puzzle(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){

        }, $request, $response, $args);
    }

    public function embaralhar(Puzzle $puzzle)
    {

        try{
            $puzzle->embaralhado = "";
            $caracteres = str_split($puzzle->estadoFinal);
            for ($i = strlen($puzzle->estadoFinal) - 1; $i >= 0; $i--) {
                $indiceAleatorio = rand(0, $i);
                $caractere = $caracteres[$indiceAleatorio];
                array_splice($caracteres, $indiceAleatorio, 1);
                $puzzle->embaralhado .= $caractere;
            }

            return true;
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function comparaPecasForaLugar(Puzzle $puzzle) {
        for ($i = 0; $i < strlen($puzzle->estadoFinal); $i++) {
            if ($puzzle->estadoFinal[$i] !== $puzzle->embaralhado[$i])
                $puzzle->pecasForaLugar++;
        }
    }

    public function distanciaManhattan(Request $request, Response $response, array $args)
    {
        return $this->encapsular_response(function($request, $response, $args){
            $data = $request->getParsedBody();
            $estadoAtual = $data['embaralhado'];
            $estadoFinal = $data['estadoFinal'];

            return HttpResponse::status200(['distanciaTotal' => Util::manhattanDistance($estadoFinal, $estadoAtual)]);

        }, $request, $response, $args);
    }

    public function dfs(Request $request, Response $response, array $args){
      return $this->encapsular_response(function ($request, $response, $args){
        $estadoFinal = $request->getParsedBody()['estadoFinal'];
        $estadoInicial = $request->getParsedBOdy()['embaralhado'];

        $teste = new BuscaEmProfundidade();

        $teste->buscar(new Puzzle($estadoFinal, $estadoInicial));

        var_dump($teste);

        if($teste)
          return HttpResponse::status200($teste);

        return HttpResponse::status404($teste);

      }, $request, $response, $args);
    }

}