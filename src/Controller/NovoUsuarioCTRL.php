<?php

namespace Src\Controller;

use Src\VO\UsuarioVO;

class NovoUsuarioCTRL
{
    public function CadastrarUsuario(UsuarioVO $voNovoUsuario)
    {

        if (
            $voNovoUsuario->getTipo() == 0 ||
            $voNovoUsuario->getSetor() == 0 ||
            empty($voNovoUsuario->getNome()) ||
            empty($voNovoUsuario->getCPF()) ||
            empty($voNovoUsuario->getEmail()) ||
            empty($voNovoUsuario->getTelefone()) ||
            empty($voNovoUsuario->getEndereco())
        )
            return 0;
       
    }
}

?>