<?php

namespace Src\VO;

use Src\_Public\Util;

class LogErroVO
{
    private $erroTecnico;
    private $codLogado;
    private $funcaoErro;

    // erroTecnico
    public function setErroTecnico(string $p)
    {
        $this->erroTecnico = $p;
    }
    public function getErroTecnico(): string
    {
        return $this->erroTecnico;
    }

    // codLogado
    public function setCodLogado(string $p)
    {
        $this->codLogado = $p;
    }
    public function getCodLogado(): string
    {
        return $this->codLogado;
    }

    // funcaoErro
    public function setFuncaoErro(string $p)
    {
        $this->funcaoErro = $p;
    }
    public function getFuncaoErro(): string
    {
        return $this->funcaoErro;
    }

    public function getDataErro(): string
    {
        return Util::DataAtualBr();
    }

    public function getHoraErro(): string
    {
        return Util::HoraAtual();
    }
}