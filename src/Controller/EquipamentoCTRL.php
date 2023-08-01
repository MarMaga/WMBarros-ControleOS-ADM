<?php

namespace Src\Controller;

use Src\VO\EquipamentoVO;

class EquipamentoCTRL
{
    public function CadastrarEquipamentoCTRL(EquipamentoVO $voEq): int
    {

        if ($voEq->getId() == 0)
            return 0;
        if ($voEq->getIdModelo() == 0)
            return 0;
        if ($voEq->getIdentificacaoEquipamento() == "")
            return 0;
        if ($voEq->getDescricaoEquipamento() == "")
            return 0;
        return 1;
    }
}

?>