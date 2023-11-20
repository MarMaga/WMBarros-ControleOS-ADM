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
    private $cidade;
    private $estado;

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
        $this->cep = Util::TratarDadosGeral($cep);
    }
    public function getCep(): string
    {
        return $this->cep;
    }

    // SET e GET cidade
    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }
    public function getCidade(): string
    {
        return $this->cidade;
    }

    // SET e GET estado
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }
    public function getEstado(): string
    {
        return $this->estado;
    }
}

?>