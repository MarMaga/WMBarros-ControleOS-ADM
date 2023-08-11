<?php

namespace Src\Controller;

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
        
        $ret = $this->modModelo->CadastrarModeloEquipamentoMODEL($voMod);

        return $ret;
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
        return $this->modModelo->AlterarModeloEquipamentoMODEL($voMod);
    }

    public function ExcluirModeloEquipamentoCTRL(ModeloVO $voMod): int
    {
        return $this->modModelo->ExcluirModeloEquipamentoMODEL($voMod);
    }
}
?>