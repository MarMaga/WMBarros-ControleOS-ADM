<?php

namespace Src\Controller;

use Src\Model\TipoEquipamentoMODEL;
use Src\VO\TipoEquipamentoVO;
use Src\_Public\Util;

class TipoEquipamentoCTRL
{
    private $modTipoEq;

    public function __construct()
    {
        $this->modTipoEq = new TipoEquipamentoMODEL();
    }

    public function CadastrarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {

        if (empty($voTipoEq->getNomeTipoEquipamento()))
            return 0;

        $voTipoEq->setCodLogado(Util::CodigoLogado());
        $voTipoEq->setFuncaoErro(CADASTRAR_TIPO_EQUIPAMENTO);

        return $this->modTipoEq->CadastrarTipoEquipamentoMODEL($voTipoEq);
    }

    public function ConsultarTipoEquipamentoCTRL(): int|array
    {
        return $this->modTipoEq->ConsultarTipoEquipamentoMODEL();
    }

    public function FiltrarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq, string $checarCadastro): int|array
    {
        return $this->modTipoEq->FiltrarTipoEquipamentoMODEL($voTipoEq, $checarCadastro);
    }

    public function AlterarTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {
        $voTipoEq->setCodLogado(Util::CodigoLogado());
        $voTipoEq->setFuncaoErro(ALTERAR_TIPO_EQUIPAMENTO);

        return $this->modTipoEq->AlterarTipoEquipamentoMODEL($voTipoEq);
    }

    public function ExcluirTipoEquipamentoCTRL(TipoEquipamentoVO $voTipoEq): int
    {
        $voTipoEq->setCodLogado(Util::CodigoLogado());
        $voTipoEq->setFuncaoErro(EXCLUIR_TIPO_EQUIPAMENTO);
        
        return $this->modTipoEq->ExcluiTipoEquipamentoMODEL($voTipoEq);
    }
}
?>