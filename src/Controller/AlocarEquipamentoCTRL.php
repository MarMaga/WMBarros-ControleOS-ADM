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
    
    public function InserirAlocacaoCTRL(AlocarVO $voAloc): int
    {

        // if ($voAloc->getIdEquipamento() == 0 || $voAloc->getIdSetor() == 0)
        //     return 0;

        $voAloc->setFuncaoErro(INSERIR_ALOCACAO);
        $voAloc->setCodLogado(Util::CodigoLogado());

        return $this->modAloc->InserirAlocacaoMODEL($voAloc);
    }

    public function AlterarAlocacaoCTRL(AlocarVO $voAloc, string $lancaDataAlocacaoRemocao): int
    {
        // if ($voAloc->getIdEquipamento() == 0 || $voAloc->getIdSetor() == 0)
        //     return 0;

        $voAloc->setFuncaoErro(ALTERAR_ALOCACAO);
        $voAloc->setCodLogado(Util::CodigoLogado());

        return $this->modAloc->AlterarAlocacaoMODEL($voAloc, $lancaDataAlocacaoRemocao);
    }
}

?>