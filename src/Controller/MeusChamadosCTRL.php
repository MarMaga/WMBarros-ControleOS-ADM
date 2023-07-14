<?php

namespace Src\Controller;

use Src\VO\ChamadoVO;

class MeusChamadosCTRL
{
    public function PesquisarChamados(ChamadoVO $voMeusChamados)
    {
        if ($voMeusChamados->getStatus() == 0)
            return 0;
        
    }
}