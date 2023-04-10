<?php

namespace App\Services;

use App\Model\Puzzle;

class BuscaEmProfundidade {

  /**
   * Função de busca em profundidade
   *
   * @param Puzzle $puzzle
   * @return bool|string
   */
  public function buscar(Puzzle $puzzle)
  {
    try{
      ini_set('memory_limit', '8G');
      ini_set('max_execution_time', '0');
      // Verifica se o estado atual é igual ao estado final
      if ($puzzle->getEstadoAtual() == $puzzle->getEstadoFinal()) {
        return $puzzle->getEstadoAtual();
      }

      $possiveisMovimentos = $this->gerarPossiveisMovimentos($puzzle);

      foreach ($possiveisMovimentos as $novoEstado) {
        $puzzle->setEstadoAtual($novoEstado);
        // Faz o movimento e busca a solução a partir do novo estado
        $resultado = $this->buscar($puzzle);

        if ($resultado) {
          return $resultado; // Se encontrou uma solução, retorna o resultado
        }
      }

      return false; // Se não encontrou uma solução, retorna falso
    }catch (\Exception $exception){
      return $exception;
    }
  }

  /**
   * Função para gerar os possíveis movimentos a partir de um estado
   *
   * @param string $estado
   * @return array
   */
  /**
   * Gera os possíveis movimentos a partir do estado atual do quebra-cabeça
   *
   * @param Puzzle $puzzle
   * @return array
   */
  public function gerarPossiveisMovimentos(Puzzle $puzzle): array
  {
    $movimentos = [];
    $estadoAtual = $puzzle->getEstadoAtual();

    // Encontrar a posição do espaço vazio
    $posicaoEspacoVazio = strpos($estadoAtual, '0');

    // Converter a posição em coordenadas (linha, coluna)
    $linha = (int) floor($posicaoEspacoVazio / 3);
    $coluna = $posicaoEspacoVazio % 3;

    // Movimento para cima
    if ($linha > 0) {
      $novoEstado = $estadoAtual;
      $novoEstado[$posicaoEspacoVazio] = $novoEstado[$posicaoEspacoVazio - 3];
      $novoEstado[$posicaoEspacoVazio - 3] = '0';
      $movimentos[] = $novoEstado;
    }

    // Movimento para baixo
    if ($linha < 2) {
      $novoEstado = $estadoAtual;
      $novoEstado[$posicaoEspacoVazio] = $novoEstado[$posicaoEspacoVazio + 3];
      $novoEstado[$posicaoEspacoVazio + 3] = '0';
      $movimentos[] = $novoEstado;
    }

    // Movimento para a esquerda
    if ($coluna > 0) {
      $novoEstado = $estadoAtual;
      $novoEstado[$posicaoEspacoVazio] = $novoEstado[$posicaoEspacoVazio - 1];
      $novoEstado[$posicaoEspacoVazio - 1] = '0';
      $movimentos[] = $novoEstado;
    }

    // Movimento para a direita
    if ($coluna < 2) {
      $novoEstado = $estadoAtual;
      $novoEstado[$posicaoEspacoVazio] = $novoEstado[$posicaoEspacoVazio + 1];
      $novoEstado[$posicaoEspacoVazio + 1] = '0';
      $movimentos[] = $novoEstado;
    }

    return $movimentos;
  }
}