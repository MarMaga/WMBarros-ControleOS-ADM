<?php
use Src\Controller\MeusChamadosCTRL;
use Src\VO\ChamadoVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_pesquisar'])){

    $voMeusChamados = new ChamadoVO();
    $ctrlMeusChamados = new MeusChamadosCTRL();

    $voMeusChamados->setStatus($_POST['status']);

    $ret = $ctrlMeusChamados->PesquisarChamados($voMeusChamados);

    
}

?>