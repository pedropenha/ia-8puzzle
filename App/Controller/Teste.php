<?php

namespace App\Controller;
use App\Services\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Teste extends Controller
{
    public function teste(Request $request, Response $response, array $args){
        return $this->encapsular_response(function ($request, $response, $args){
            return HttpResponse::status200();
        }, $request, $response, $args);
    }

}