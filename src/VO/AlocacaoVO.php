<?php

namespace Src\VO;

use Src\_Public\Util;

class AlocacaoVO
{
    private $id;
    private $data_alocacao;
    private $data_remocao;
    private $id_equipamento;
    private $id_setor;

    // SET e GET id
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // GET data_alocacao
    public function getDataAlocacao(): string
    {
        return Util::DataAtual();
    }

    // GET data_remocao
    public function getDataRemocao(): string
    {
        return Util::DataAtual();
    }

    // SET e GET id_equipamento
    public function setIdEquiupamento($id_equipamento): void
    {
        $this->id_equipamento = $id_equipamento;
    }
    public function getIdEquipamento(): int
    {
        return $this->id_equipamento;
    }

    // SET e GET id_setor
    public function setIdSetor($id_setor): void
    {
        $this->id_setor = $id_setor;
    }
    public function getIdSetor(): int
    {
        return $this->id_setor;
    }
}

?>