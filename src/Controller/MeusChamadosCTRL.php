<?php

namespace Src\Controller;

use Src\VO\ChamadoVO;

class MeusChamadosCTRL
{
    public function PesquisarChamados(ChamadoVO $voMeusChamados): int
    {
        if ($voMeusChamados->getStatus() == 0)
            return 0;
        return 1;
    }
}