<?php

namespace Src\Controller;

use Src\VO\ChamadoVO;

class ConsultarChamadosCTRL
{
    public function PesquisarChamado(ChamadoVO $voConsultarChamado): int
    {
        if ($voConsultarChamado->getStatus() == 0)
            return 0;
        return 1;
    }
}

?>