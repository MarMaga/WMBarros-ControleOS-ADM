<?php

namespace Src\VO;

use Src\_Public\Util;

class EquipamentoVO
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
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // SET e GET ident_equipamento
    public function setIdentificacaoEquipamento($ident_equipamento): void
    {
        $this->ident_equipamento = Util::RemoverTags($ident_equipamento);
    }
    public function getIdentificacaoEquipamento(): string
    {
        return $this->ident_equipamento;
    }

    // SET e GET desc_equipamento
    public function setDescricaoEquipamento($desc_equipamento): void
    {
        $this->desc_equipamento = Util::RemoverTags($desc_equipamento);
    }
    public function getDescricaoEquipamento(): string
    {
        return $this->desc_equipamento;
    }

    // SET e GET id
    public function setSituacao($situacao): void
    {
        $this->situacao = $situacao;
    }
    public function getSituacao(): int
    {
        return $this->situacao;
    }

    // GET data_descarte
    public function setDataDescarte($data_descarte): void
    {
        $this->data_descarte = Util::TirarCaracteresEspeciais($data_descarte);
    }
    public function getDataDescarte(): string
    {
        return $this->data_descarte;
    }

    // SET e GET motivo_descarte
    public function setMotivoDescarte($motivo_descarte): void
    {
        $this->motivo_descarte = $motivo_descarte;
    }
    public function getMotivoDescarte(): string
    {
        return $this->motivo_descarte;
    }

    // SET e GET id_tipo_equipamento
    public function setIdTipoEquipamento($id_tipo_equipamento): void
    {
        $this->id_tipo_equipamento = $id_tipo_equipamento;
    }
    public function getIdTipoEquipamento(): int
    {
        return $this->id_tipo_equipamento;
    }

    // SET e GET id_modelo
    public function setIdModelo($id_modelo): void
    {
        $this->id_modelo = $id_modelo;
    }
    public function getIdModelo(): int
    {
        return $this->id_modelo;
    }
}

?>