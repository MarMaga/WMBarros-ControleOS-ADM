<?php

namespace Src\Controller;

use Src\_Public\Util;
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
        
        $voMod->setCodLogado(Util::CodigoLogado());
        $voMod->setFuncaoErro(CADASTRAR_MODELO_EQUIPAMENTO);

        return $this->modModelo->CadastrarModeloEquipamentoMODEL($voMod);
    }

    public function ConsultarModeloEquipamentoCTRL(): int|array
    {
        return $this->modModelo->ConsultarModeloEquipamentoMODEL();
    }

    public function FiltrarModeloEquipamentoCTRL(ModeloVO $voMod, string $checarCadastro): int|array
    {
        return $this->modModelo->FiltrarModeloEquipamentoMODEL($voMod, $checarCadastro);
    }

    public function AlterarModeloEquipamentoCTRL(ModeloVO $voMod): int
    {
        $voMod->setCodLogado(Util::CodigoLogado());
        $voMod->setFuncaoErro(ALTERAR_MODELO_EQUIPAMENTO);

        return $this->modModelo->AlterarModeloEquipamentoMODEL($voMod);
    }

    public function ExcluirModeloEquipamentoCTRL(ModeloVO $voMod): int
    {
        $voMod->setCodLogado(Util::CodigoLogado());
        $voMod->setFuncaoErro(EXCLUIR_MODELO_EQUIPAMENTO);
        
        return $this->modModelo->ExcluirModeloEquipamentoMODEL($voMod);
    }
}
?>