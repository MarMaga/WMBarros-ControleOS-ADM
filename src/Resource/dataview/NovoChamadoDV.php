<?php
use Src\Controller\NovoChamadoCTRL;
use Src\VO\ChamadoVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_gravar'])){

    $voNovoChamado = new ChamadoVO();
    $ctrlNovoChamado = new NovoChamadoCTRL();

    $voNovoChamado->setIdEquipamento(intval($_POST['equipamento']));
    $voNovoChamado->setProblema($_POST['problema']);

    $ret = $ctrlNovoChamado->CadastrarChamado($voNovoChamado);

    
}

?>