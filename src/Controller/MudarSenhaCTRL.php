<?php

namespace Src\Controller;

use Src\VO\UsuarioVO;

class MudarSenhaCTRL
{
    public function AtualizarSenha(UsuarioVO $voMudarSenha)
    {

        if (
            empty($voMudarSenha->getSenha()) ||
            empty($voMudarSenha->getNovaSenha()) ||
            empty($voMudarSenha->getNovaSenhaRepetida())
        )
            return 0;
        
    }
}

?>