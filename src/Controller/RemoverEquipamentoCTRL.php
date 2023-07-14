<?php

namespace Src\Controller;

use Src\VO\AlocarVO;

class RemoverEquipamentoCTRL
{
    public function Remover(AlocarVO $voRemover)
    {

        if ($voRemover->getIdSetor() == 0)
            return 0;
    
    }
}

?>