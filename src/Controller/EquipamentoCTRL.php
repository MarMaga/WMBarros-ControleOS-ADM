<?php

namespace Src\Controller;

use Src\VO\EquipamentoVO;
use Src\Model\EquipamentoMODEL;

class EquipamentoCTRL
{
    private $modEq;

    public function __construct()
    {
        $this->modEq = new EquipamentoMODEL();
    }

    public function CadastrarEquipamentoCTRL(EquipamentoVO $voEq): int
    {

        if ($voEq->getIdTipoEquipamento() == 0)
            return 0;
        if ($voEq->getIdModelo() == 0)
            return 0;
        if ($voEq->getIdentificacaoEquipamento() == "")
            return 0;
        if ($voEq->getDescricaoEquipamento() == "")
            return 0;

        $ret = $this->modEq->CadastrarEquipamentoMODEL($voEq);

        return $ret;
    }

    public function FiltrarEquipamentoCTRL(EquipamentoVO $voEq, $checarCadastro): int|array
    {
        $ret = $this->modEq->FiltrarEquipamentoMODEL($voEq, $checarCadastro);

        return $ret;
    }

    public function ConsultarEquipamentoCTRL(string $comFiltro): int|array
    {
        $ret = $this->modEq->ConsultarEquipamentoMODEL($comFiltro);

        return $ret;
    }
}

?>