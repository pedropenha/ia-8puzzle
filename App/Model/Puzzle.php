<?php

namespace App\Model;

final class Puzzle
{

  public int $geracao;
  public int $pecasForaLugar;
  public float $f;
  public string $estadoFinal;
  public string $estadoInicial;
  public string $estadoAtual;

  /**
   * @param int $geracao
   * @param int $pecasForaLugar
   * @param float $f
   * @param string $estadoFinal
   * @param string $estadoInicial
   */
  public function __construct(string $estadoFinal, string $estadoInicial)
  {
    $this->geracao = 0;
    $this->pecasForaLugar = 0;
    $this->f = 0.0;
    $this->estadoFinal = $estadoFinal;
    $this->estadoInicial = $estadoInicial;
    $this->estadoAtual = $estadoInicial;
  }

  /**
   * @return int
   */
  public function getGeracao(): int
  {
    return $this->geracao;
  }

  /**
   * @param int $geracao
   */
  public function setGeracao(int $geracao): void
  {
    $this->geracao = $geracao;
  }

  /**
   * @return int
   */
  public function getPecasForaLugar(): int
  {
    return $this->pecasForaLugar;
  }

  /**
   * @param int $pecasForaLugar
   */
  public function setPecasForaLugar(int $pecasForaLugar): void
  {
    $this->pecasForaLugar = $pecasForaLugar;
  }

  /**
   * @return float
   */
  public function getF(): float
  {
    return $this->f;
  }

  /**
   * @param float $f
   */
  public function setF(float $f): void
  {
    $this->f = $f;
  }

  /**
   * @return string
   */
  public function getEstadoFinal(): string
  {
    return $this->estadoFinal;
  }

  /**
   * @param string $estadoFinal
   */
  public function setEstadoFinal(string $estadoFinal): void
  {
    $this->estadoFinal = $estadoFinal;
  }

  /**
   * @return string
   */
  public function getEstadoInicial(): string
  {
    return $this->estadoInicial;
  }

  /**
   * @param string $estadoInicial
   */
  public function setEstadoInicial(string $estadoInicial): void
  {
    $this->estadoInicial = $estadoInicial;
  }

  /**
   * @return string
   */
  public function getEstadoAtual(): string
  {
    return $this->estadoAtual;
  }

  /**
   * @param string $estadoAtual
   */
  public function setEstadoAtual(string $estadoAtual): void
  {
    $this->estadoAtual = $estadoAtual;
  }
}