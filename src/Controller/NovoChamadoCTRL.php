<?php

namespace Src\Controller;

use Src\VO\ChamadoVO;

class NovoChamadoCTRL
{
    public function CadastrarChamado(ChamadoVO $voNovoChamado)
    {
        if ($voNovoChamado->getIdEquipamento() == 0 || $voNovoChamado->getProblema() == '')
            return 0;
        
    }
}

?>