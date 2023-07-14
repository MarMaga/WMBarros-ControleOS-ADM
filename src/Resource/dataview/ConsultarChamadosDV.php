<?php
use Src\Controller\ConsultarChamadosCTRL;
use Src\VO\ChamadoVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_pesquisar'])){

    $voConsultarChamados = new ChamadoVO();
    $ctrlConsultarChamados = new ConsultarChamadosCTRL();

    $voConsultarChamados->setStatus($_POST['status']);

    $ret = $ctrlConsultarChamados->PesquisarChamado($voConsultarChamados);

    
}

?>