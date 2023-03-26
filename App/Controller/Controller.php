<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;

class Controller
{

    private $container;

    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __get($property){
        if($this->container->{$property})
            return $this->container->{$property};
    }

    protected function encapsular_response($callback, $request, $response, $args){
        try{
            $response_callback = $callback($request, $response, $args);

            if(array_key_exists('statusCodeHttp', $response_callback) && $response_callback['statusCodeHttp'] != 200){ // alguma coisa diferente de 200
                $mensagem = 'Não foi possivel completar a solicitação';

                if(isset($response_callback['mensagem'])){
                    $mensagem = $response_callback['mensagem'];
                }
                $response->getBody()->write(json_encode($mensagem));
                return $response->withHeader('Content-type', 'application/json')->withStatus($response_callback['statusCodeHttp']);
            }
        }catch (\Exception $e){
            $response->getBody()->write(json_encode($e->getMessage()));

            return $response->withHeader('Content-type', 'application/json')->withStatus(500);
        }

        $response->getBody()->write(json_encode($response_callback));

        return $response->withHeader('Content-type', 'application/json');
    }
}