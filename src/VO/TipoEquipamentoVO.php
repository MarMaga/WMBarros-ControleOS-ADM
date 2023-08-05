<?php

namespace Src\VO;

use Src\_Public\Util;

class TipoEquipamentoVO
{
    private $id;
    private $nome;

    // SET e GET id_tipo_equipamento
    public function setIdTipoEquipamento(int $id): void
    {
        $this->id = $id;
    }
    public function getIdTipoEquipamento(): int
    {
        return $this->id;
    }

    // SET e GET tipo_equipamento
    public function setNomeTipoEquipamento(string $nome): void
    {
        $this->nome = Util::TratarDadosGeral($nome);
    }
    public function getNomeTipoEquipamento(): string
    {
        return $this->nome;
    }
}

?>