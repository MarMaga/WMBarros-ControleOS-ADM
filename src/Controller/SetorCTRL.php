<?php

namespace Src\Controller;

use Src\Model\SetorMODEL;
use Src\VO\SetorVO;
use Src\_Public\Util;

class SetorCTRL
{
    private $modSetor;

    public function __construct()
    {
        $this->modSetor = new SetorMODEL();
    }

    public function CadastrarSetorCTRL(SetorVO $voSetor): int
    {

        if (empty($voSetor->getNome()))
            return 0;

        $voSetor->setCodLogado(Util::CodigoLogado());
        $voSetor->setFuncaoErro(CADASTRAR_SETOR);

        return $this->modSetor->CadastrarSetorMODEL($voSetor);
    }

    public function ConsultarSetorCTRL(): int|array
    {
        return $this->modSetor->ConsultarSetorMODEL();
    }

    public function FiltrarSetorCTRL(SetorVO $voSetor, string $checarCadastro): int|array
    {
        return $this->modSetor->FiltrarSetorMODEL($voSetor, $checarCadastro);
    }

    public function AlterarSetorCTRL(SetorVO $voSetor): int
    {
        $voSetor->setCodLogado(Util::CodigoLogado());
        $voSetor->setFuncaoErro(ALTERAR_SETOR);

        return $this->modSetor->AlterarSetorMODEL($voSetor);
    }

    public function ExcluirSetorCTRL(SetorVO $voSetor): int
    {
        $voSetor->setCodLogado(Util::CodigoLogado());
        $voSetor->setFuncaoErro(EXCLUIR_SETOR);
        
        return $this->modSetor->ExcluiSetorMODEL($voSetor);
    }
}
?>