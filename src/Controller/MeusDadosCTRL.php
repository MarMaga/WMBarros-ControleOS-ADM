<?php

namespace Src\Controller;

use Src\VO\UsuarioVO;

class MeusDadosCTRL
{
    public function AtualizarMeusDados(UsuarioVO $voMeusDados)
    {

        if (
            empty($voMeusDados->getNome()) ||
            empty($voMeusDados->getEmail()) ||
            empty($voMeusDados->getTelefone()) ||
            empty($voMeusDados->getEndereco())
        )
            return 0;
        
    }
}

?>