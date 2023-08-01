<?php

namespace Src\Controller;

use Src\VO\EquipamentoVO;

class ConsultaEquipamentoCTRL
{
    public function ConsultarEquipamentoCTRL(EquipamentoVO $voTipoEq): int
    {

        if ($voTipoEq->getIdTipoEquipamento() == 0)
            return 0;
        return 1;
    }
}

?>