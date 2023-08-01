<?php

namespace Src\Controller;

use Src\Model\TipoEquipamentoMODEL;
use Src\VO\TipoEquipamentoVO;

class TipoEquipamentoCTRL
{
    public function CadastrarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {

        if (empty($voTipoEq->getNomeTipoEquipamento()))
            return 0;

        $modTipoEq = new TipoEquipamentoMODEL();

        $ret = $modTipoEq->CadastrarTipoEquipamentoMODEL($voTipoEq);

        return $ret;
    }

    public function ConsultarTodosTipoEquipamentoCTRL()
    {
        $modTipoEq = new TipoEquipamentoMODEL();

        $ret = $modTipoEq->ConsultaTodosTipoEquipamentoMODEL();

        return $ret;
    }

    public function AlterarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {
        $modTipoEq = new TipoEquipamentoMODEL();

        $ret = $modTipoEq->AlterarTipoEquipamentoMODEL($voTipoEq);

        return $ret;
    }
    
    public function ExcluirTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {
        $modTipoEq = new TipoEquipamentoMODEL();

        $ret = $modTipoEq->ExcluiTipoEquipamentoMODEL($voTipoEq);

        return $ret;
    }
}
?>