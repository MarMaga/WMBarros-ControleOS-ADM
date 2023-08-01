<?php

namespace Src\Controller;

use Src\VO\ChamadoVO;

class NovoChamadoCTRL
{
    public function CadastrarChamado(ChamadoVO $voNovoChamado): int
    {
        if ($voNovoChamado->getIdEquipamento() == 0 || $voNovoChamado->getProblema() == '')
            return 0;
        return 1;
    }
}

?>