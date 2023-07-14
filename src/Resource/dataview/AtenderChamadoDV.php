<?php
use Src\Controller\AtenderChamadoCTRL;
use Src\VO\ChamadoVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_gravar'])){

    $voAtenderChamado = new ChamadoVO();
    $ctrlAtenderChamado = new AtenderChamadoCTRL();

    $voAtenderChamado->setIdSetor($_POST['setor']);
    $voAtenderChamado->setIdFuncionario($_POST['funcionario']);
    $voAtenderChamado->setIdEquipamento($_POST['equipamento']);
    $voAtenderChamado->setProblema($_POST['problema']);
    $voAtenderChamado->setLaudo($_POST['laudo']);

    $ret = $ctrlAtenderChamado->GravarAtendimento($voAtenderChamado);

    
}

?>