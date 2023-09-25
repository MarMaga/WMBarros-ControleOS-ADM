<?php

namespace Src\Controller;

use Src\_Public\Util;
use Src\VO\EquipamentoVO;
use Src\Model\EquipamentoMODEL;

class EquipamentoCTRL
{
    private $modEq;

    public function __construct()
    {
        $this->modEq = new EquipamentoMODEL();
    }

    public function CadastrarEquipamentoCTRL(EquipamentoVO $voEq): int
    {

        if ($voEq->getIdTipoEquipamento() == 0 || $voEq->getIdModelo() == 0 ||
            $voEq->getIdentificacaoEquipamento() == "" || $voEq->getDescricaoEquipamento() == "")
            return 0;

        $voEq->setSituacao(SITUACAO_ATIVO);
        $voEq->setFuncaoErro(CADASTRAR_EQUIPAMENTO);
        $voEq->setCodLogado(Util::CodigoLogado());
        
        return $this->modEq->CadastrarEquipamentoMODEL($voEq);
    }

    public function AlterarEquipamentoCTRL(EquipamentoVO $voEq): int
    {

        if ($voEq->getIdTipoEquipamento() == 0 || $voEq->getIdModelo() == 0 ||
            $voEq->getIdentificacaoEquipamento() == "" || $voEq->getDescricaoEquipamento() == "")
            return 0;

        $voEq->setFuncaoErro(ALTERAR_EQUIPAMENTO);
        $voEq->setCodLogado(Util::CodigoLogado());
        
        return $this->modEq->AlterarEquipamentoMODEL($voEq);
    }

    public function DetalharEquipamentoCTRL(int $id): array | string
    {
        return $this->modEq->DetalharEquipamentoMODEL($id);
    }

    public function PesquisarEquipamentoCTRL(EquipamentoVO $voEq, $checarCadastro): int|array
    {
        return $this->modEq->PesquisarEquipamentoMODEL($voEq, $checarCadastro);
    }

    public function ConsultarEquipamentoCTRL(string $comFiltro): int|array
    {
        return $this->modEq->ConsultarEquipamentoMODEL($comFiltro);
    }

    public function ExcluirEquipamentoCTRL(EquipamentoVO $voEq): int
    {
        if (empty($voEq->getId()))
            return 0;

        $voEq->setCodLogado(Util::CodigoLogado());
        $voEq->setFuncaoErro(EXCLUIR_EQUIPAMENTO);
        
        return $this->modEq->ExcluirEquipamentoMODEL($voEq);
    }

    public function FiltrarEquipamentoCTRL($idTipo, $idModelo): array
    {
        return $this->modEq->FiltrarEquipamentoMODEL($idTipo, $idModelo);
    }
}
?>