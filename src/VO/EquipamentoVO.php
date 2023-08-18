<?php

namespace Src\VO;

use Src\_Public\Util;
use Src\VO\LogErroVO;

class EquipamentoVO extends LogErroVO
{
    private $id;
    private $ident_equipamento;
    private $desc_equipamento;
    private $situacao;
    private $data_descarte;
    private $motivo_descarte;
    private $id_tipo_equipamento;
    private $id_modelo;

    // SET e GET id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // SET e GET ident_equipamento
    public function setIdentificacaoEquipamento(string $ident_equipamento): void
    {
        $this->ident_equipamento = Util::RemoverTags($ident_equipamento);
    }
    public function getIdentificacaoEquipamento(): string
    {
        return $this->ident_equipamento;
    }

    // SET e GET desc_equipamento
    public function setDescricaoEquipamento(string $desc_equipamento): void
    {
        $this->desc_equipamento = Util::RemoverTags($desc_equipamento);
    }
    public function getDescricaoEquipamento(): string
    {
        return $this->desc_equipamento;
    }

    // SET e GET situacao
    public function setSituacao(int $situacao): void
    {
        $this->situacao = $situacao;
    }
    public function getSituacao(): int
    {
        return $this->situacao;
    }

    // GET data_descarte
    public function setDataDescarte(string $data_descarte): void
    {
        $this->data_descarte = Util::TratarDadosGeral($data_descarte);
    }
    public function getDataDescarte(): string
    {
        return $this->data_descarte;
    }

    // SET e GET motivo_descarte
    public function setMotivoDescarte(string $motivo_descarte): void
    {
        $this->motivo_descarte = $motivo_descarte;
    }
    public function getMotivoDescarte(): string
    {
        return $this->motivo_descarte;
    }

    // SET e GET id_tipo_equipamento
    public function setIdTipoEquipamento(int $id_tipo_equipamento): void
    {
        $this->id_tipo_equipamento = $id_tipo_equipamento;
    }
    public function getIdTipoEquipamento(): int
    {
        return $this->id_tipo_equipamento;
    }

    // SET e GET id_modelo
    public function setIdModelo(int $id_modelo): void
    {
        $this->id_modelo = $id_modelo;
    }
    public function getIdModelo(): int
    {
        return $this->id_modelo;
    }
}
?>