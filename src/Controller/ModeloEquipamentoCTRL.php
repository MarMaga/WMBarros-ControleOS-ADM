<?php

namespace Src\Controller;

use Src\Model\ModeloEquipamentoMODEL;
use Src\VO\ModeloVO;

class ModeloEquipamentoCTRL
{
    private $modModelo;

    public function __construct()
    {
        $this->modModelo = new ModeloEquipamentoMODEL();
    }
    
    public function CadastrarModeloEquipamentoCTRL(ModeloVO $voMod): int
    {

        if (empty($voMod->getNomeModelo()))
            return 0;
        
        $ret = $this->modModelo->CadastrarModeloEquipamentoMODEL($voMod);

        return $ret;
    }
}

?>