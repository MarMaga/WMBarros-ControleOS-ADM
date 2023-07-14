<?php

namespace Src\Controller;

use Src\VO\AlocarVO;

class AlocarEquipamentoCTRL
{
    public function Alocar(AlocarVO $voAloc){
        
        if($voAloc->getIdEquipamento() == 0 || $voAloc->getIdSetor() == 0)
            return 0;

    }
}

?>