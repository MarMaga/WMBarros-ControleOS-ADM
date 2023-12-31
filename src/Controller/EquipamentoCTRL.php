<?php

namespace Src\Controller;

use Src\_Public\Util;
use Src\VO\EquipamentoVO;
use Src\VO\AlocarVO;
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
        return $this->modEq->FiltrarEquipamentoMODEL($idTipo, $idModelo, SITUACAO_EQUIPAMENTO_DESALOCADO);
    }

    public function AtivarInativarEquipamentoCTRL(EquipamentoVO $voEq): int
    {
        if ($voEq->getIdTipoEquipamento() == 0 || 
            $voEq->getIdModelo() == 0 ||
            $voEq->getIdentificacaoEquipamento() == "" ||
            $voEq->getDescricaoEquipamento() == "")
            return 0;

        $voEq->setFuncaoErro(ATIVAR_INATIVAR_EQUIPAMENTO);
        $voEq->setCodLogado(Util::CodigoLogado());
        
        return $this->modEq->AtivarInativarEquipamentoMODEL($voEq);
    }

    public function SelecionarEquipamentosNaoAlocadosCTRL(): array | null
    {
        return $this->modEq->SelecionarEquipamentosNaoAlocadosMODEL(SITUACAO_ATIVO, SITUACAO_EQUIPAMENTO_DESALOCADO);
    }

    public function FiltrarEquipamentosPorSetorCTRL(int $setorID): array | null
    {
        return $this->modEq->FiltrarEquipamentosPorSetorMODEL($setorID, SITUACAO_EQUIPAMENTO_ALOCADO);
    }

    public function AlocarEquipamentoCTRL(AlocarVO $voAloc): int
    {

        if ($voAloc->getIdEquipamento() == 0 || $voAloc->getIdSetor() == 0)
            return 0;

        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);
        $voAloc->setFuncaoErro(ALOCAR_EQUIPAMENTO);
        $voAloc->setCodLogado(Util::CodigoLogado());

        return $this->modEq->AlocarEquipamentoMODEL($voAloc);
    }

    public function DesalocarEquipamentoCTRL(AlocarVO $voAloc): int
    {
        if ($voAloc->getId() == 0 || $voAloc->getSituacao() == '')
            return 0;

        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_DESALOCADO);
        $voAloc->setFuncaoErro(DESALOCAR_EQUIPAMENTO);
        $voAloc->setCodLogado(Util::CodigoLogado());

        return $this->modEq->DesalocarEquipamentoMODEL($voAloc);
    }
}
?>