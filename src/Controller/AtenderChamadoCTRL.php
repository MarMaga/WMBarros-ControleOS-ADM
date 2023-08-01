<?php

namespace Src\Controller;

use Src\VO\ChamadoVO;

class AtenderChamadoCTRL
{
    public function GravarAtendimento(ChamadoVO $voAtenderChamado): int
    {

        if (
            $voAtenderChamado->getIdSetor() == 0 ||
            $voAtenderChamado->getIdFuncionario() == 0 ||
            $voAtenderChamado->getIdEquipamento() == 0 ||
            empty($voAtenderChamado->getProblema()) ||
            empty($voAtenderChamado->getLaudo())
        )
            return 0;
        return 1;
    }
}

?>