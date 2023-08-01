<?php

namespace Src\Controller;

use Src\Model\ModeloEquipamentoMODEL;
use Src\VO\ModeloVO;

class ModeloEquipamentoCTRL
{
    public function CadastrarModeloEquipamentoCTRL(ModeloVO $voMod): int
    {

        if (empty($voMod->getNomeModelo()))
            return 0;
        
        $modModelo = new ModeloEquipamentoMODEL();

        $ret = $modModelo->CadastrarModeloEquipamento($voMod);

        return $ret;
    }
}

?>