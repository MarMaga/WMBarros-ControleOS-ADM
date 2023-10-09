<?php

namespace Src\Controller;

use Src\_Public\Util;
use Src\Model\AlocarEquipamentoMODEL;
use Src\VO\AlocarVO;

class AlocarEquipamentoCTRL
{
    private $modAloc;

    public function __construct()
    {
        $this->modAloc = new AlocarEquipamentoMODEL();
    }
    
    public function AlocarCTRL(AlocarVO $voAloc): int
    {

        // if ($voAloc->getIdEquipamento() == 0 || $voAloc->getIdSetor() == 0)
        //     return 0;

        $voAloc->setFuncaoErro(INSERIR_ALOCACAO);
        $voAloc->setCodLogado(Util::CodigoLogado());

        return $this->modAloc->AlocarMODEL($voAloc);
    }

    public function DesalocarCTRL(AlocarVO $voAloc): int
    {
        // if ($voAloc->getIdEquipamento() == 0 || $voAloc->getIdSetor() == 0)
        //     return 0;

        $voAloc->setFuncaoErro(ALTERAR_ALOCACAO);
        $voAloc->setCodLogado(Util::CodigoLogado());

        return $this->modAloc->DesalocarMODEL($voAloc);
    }
}

?>