<?php

namespace Src\VO;

use Src\_Public\Util;

class TipoEquipamentoVO
{
    private $id;
    private $tipo_equipamento;

    // SET e GET id_tipo_equipamento
    public function setIdTipoEquipamento($id): void
    {
        $this->id = $id;
    }
    public function getIdTipoEquipamento(): int
    {
        return $this->id;
    }

    // SET e GET tipo_equipamento
    public function setTipoEquipamento($tipo_equipamento): void
    {
        $this->tipo_equipamento = Util::RemoverTags($tipo_equipamento);
    }
    public function getTipoEquipamento(): string
    {
        return $this->tipo_equipamento;
    }
}

?>