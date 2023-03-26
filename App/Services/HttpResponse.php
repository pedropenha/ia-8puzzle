<?php

namespace App\Services;

final class HttpResponse{

    public static function status404($mensagem=''): array
    {
        return ['mensagem' => empty($mensagem) ? 'Item não encontrado.' : $mensagem, 'statusCodeHttp' => 404];
    }

    public static function status401($mensagem=''): array
    {
        return ['mensagem' => empty($mensagem) ? 'Acesso não autorizado.' : $mensagem, 'statusCodeHttp' => 401];
    }

    public static function status200($array = []): array
    {
        return ['status' => 'sucesso',  "objeto" => !empty($array) ? $array : ''];
    }

    public static function status500($mensagem=''): array
    {
        return ['mensagem' => empty($mensagem) ? 'Erro inesperado, contacte o administrador do sistema' : $mensagem, 'statusCodeHttp' => 500];
    }

    public static function status400($mensagem=''): array
    {
        return ['mensagem' => empty($mensagem) ? 'Informe todos os campos obrigatórios.' : $mensagem, 'statusCodeHttp' => 400];
    }
}