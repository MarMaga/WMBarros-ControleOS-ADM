<?php

namespace Src\Controller;

use Src\VO\UsuarioVO;

class ConsultarUsuarioCTRL
{
    public function Consultar(UsuarioVO $voConsultarUsuario)
    {

        if (empty($voConsultarUsuario->getNome()))
            return 0;
        
    }
}

?>