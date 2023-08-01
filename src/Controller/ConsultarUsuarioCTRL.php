<?php

namespace Src\Controller;

use Src\VO\UsuarioVO;

class ConsultarUsuarioCTRL
{
    public function Consultar(UsuarioVO $voConsultarUsuario): int
    {

        if (empty($voConsultarUsuario->getNome()))
            return 0;
        return 1;
    }
}

?>