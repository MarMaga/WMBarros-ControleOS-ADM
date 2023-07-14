<?php

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_cadastrar'])){

    $voEq = new EquipamentoVO();
    $ctrlEq = new EquipamentoCTRL();

    $voEq->setId(intval($_POST['tipo']));
    $voEq->setIdModelo(intval($_POST['modelo']));
    $voEq->setIdentificacaoEquipamento(trim($_POST['identificacao']));
    $voEq->setDescricaoEquipamento(trim($_POST['descricao']));

    $ret = $ctrlEq->CadastrarEquipamentoCTRL($voEq);

}

?>