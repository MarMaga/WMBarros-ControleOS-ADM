<?php

namespace Src\Controller;
use Src\VO\ModeloVO;

class ModeloEquipamentoCTRL
{
    public function CadastrarModeloEquipamentoCTRL(ModeloVO $voMod){

        if(empty($voMod->getNomeModelo()))
            return 0;
      
    }
}

?>