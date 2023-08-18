<?php

namespace Src\VO;

use Src\_Public\Util;
use Src\VO\LogErroVO;

class EnderecoVO extends LogErroVO
{
    private $id;
    private $rua;
    private $bairro;
    private $cep;
    private $id_usuario;
    private $id_cidade;
    private $nome_cidade;
    private $id_estado;
    private $nome_estado;
    private $sigla_estado;

    // SET e GET id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // SET e GET rua
    public function setRua(string $rua): void
    {
        $this->rua = Util::RemoverTags($rua);
    }
    public function getRua(): string
    {
        return $this->rua;
    }

    // SET e GET bairro
    public function setBairro(string $bairro): void
    {
        $this->bairro = Util::TratarDadosGeral($bairro);
    }
    public function getBairro(): string
    {
        return $this->bairro;
    }

    // SET e GET cep
    public function setCep(string $cep): void
    {
        $this->cep = Util::TirarCaracteresEspeciais($cep);
    }
    public function getCep(): string
    {
        return $this->cep;
    }

    // SET e GET id_usuario
    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }
    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    // SET e GET id_cidade
    public function setIdCidade(int $id_cidade): void
    {
        $this->id_cidade = $id_cidade;
    }
    public function getIdCidade(): int
    {
        return $this->id_cidade;
    }

    // SET e GET nome_cidade
    public function setNomeCidade(string $nome_cidade): void
    {
        $this->nome_cidade = Util::TratarDadosGeral($nome_cidade);
    }
    public function getNomeCidade(): string
    {
        return $this->nome_cidade;
    }

    // SET e GET id_estado
    public function setIdEstado(int $id_estado): void
    {
        $this->id_estado = $id_estado;
    }
    public function getIdEstado(): int
    {
        return $this->id_estado;
    }

    // SET e GET nome_estado
    public function setNomeEstado(string $nome_estado): void
    {
        $this->nome_estado = $nome_estado;
    }
    public function getNomeEstado(): string
    {
        return $this->nome_estado;
    }

    // SET e GET sigla_estado
    public function setSiglaEstado(string $sigla_estado): void
    {
        $this->sigla_estado = $sigla_estado;
    }
    public function getSiglaEstado(): string
    {
        return $this->sigla_estado;
    }
}

?>