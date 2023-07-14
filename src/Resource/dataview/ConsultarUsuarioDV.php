<?php

use Src\Controller\ConsultarUsuarioCTRL;
use Src\VO\UsuarioVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if (isset($_POST['btn_buscar'])) {

    $voConsultarUsuario = new UsuarioVO();
    $ctrlConsultarUsuario = new ConsultarUsuarioCTRL();

    $voConsultarUsuario->setNome($_POST['nome']);

    $ret = $ctrlConsultarUsuario->Consultar($voConsultarUsuario);

    
}

?>