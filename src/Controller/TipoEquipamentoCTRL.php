<?php

namespace Src\Controller;

use Src\VO\TipoEquipamentoVO;

class TipoEquipamentoCTRL
{
    public function CadastrarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {

        if (empty($voTipoEq->getNomeTipoEquipamento()))
            return 0;

    }
}
?>