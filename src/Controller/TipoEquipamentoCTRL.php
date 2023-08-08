<?php

namespace Src\Controller;

use Src\Model\TipoEquipamentoMODEL;
use Src\VO\TipoEquipamentoVO;

class TipoEquipamentoCTRL
{
    private $modTipoEq;

    public function __construct()
    {
        $this->modTipoEq = new TipoEquipamentoMODEL();
    }

    public function CadastrarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {

        if (empty($voTipoEq->getNomeTipoEquipamento()))
            return 0;

        return $this->modTipoEq->CadastrarTipoEquipamentoMODEL($voTipoEq);
    }

    public function ConsultarTipoEquipamentoCTRL(): int|array
    {
        return $this->modTipoEq->ConsultarTipoEquipamentoMODEL();
    }

    public function FiltrarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq, string $checarCadastro): int|array
    {
        return $this->modTipoEq->FiltrarTipoEquipamentoMODEL($voTipoEq, $checarCadastro);
    }

    public function AlterarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {
        return $this->modTipoEq->AlterarTipoEquipamentoMODEL($voTipoEq);
    }

    public function ExcluirTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {
        return $this->modTipoEq->ExcluiTipoEquipamentoMODEL($voTipoEq);
    }
}
?>