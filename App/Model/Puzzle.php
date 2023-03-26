<?php

namespace App\Model;

final class Puzzle
{

    public $geracao;
    public $pecasForaLugar;
    public $f;
    public $estadoFinal;
    public $embaralhado;

    /**
     * @param $geracao
     * @param $pecasForaLugar
     * @param $f
     * @param $estadoFinal
     * @param $embaralhado
     */
    public function __construct($geracao, $pecasForaLugar, $f, $estadoFinal, $embaralhado)
    {
        $this->geracao = $geracao;
        $this->pecasForaLugar = $pecasForaLugar;
        $this->f = $f;
        $this->estadoFinal = $estadoFinal;
        $this->embaralhado = $embaralhado;
    }

    /**
     * @return mixed
     */
    public function getGeracao()
    {
        return $this->geracao;
    }

    /**
     * @param mixed $geracao
     */
    public function setGeracao($geracao): void
    {
        $this->geracao = $geracao;
    }

    /**
     * @return mixed
     */
    public function getPecasForaLugar()
    {
        return $this->pecasForaLugar;
    }

    /**
     * @param mixed $pecasForaLugar
     */
    public function setPecasForaLugar($pecasForaLugar): void
    {
        $this->pecasForaLugar = $pecasForaLugar;
    }

    /**
     * @return mixed
     */
    public function getF()
    {
        return $this->f;
    }

    /**
     * @param mixed $f
     */
    public function setF(): void
    {
        $this->f = $this->geracao + $this->pecasForaLugar;
    }

    /**
     * @return mixed
     */
    public function getEstadoFinal()
    {
        return $this->estadoFinal;
    }

    /**
     * @param mixed $estadoFinal
     */
    public function setEstadoFinal($estadoFinal): void
    {
        $this->estadoFinal = $estadoFinal;
    }

    /**
     * @return mixed
     */
    public function getEmbaralhado()
    {
        return $this->embaralhado;
    }

    /**
     * @param mixed $embaralhado
     */
    public function setEmbaralhado($embaralhado): void
    {
        $this->embaralhado = $embaralhado;
    }
}