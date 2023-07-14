<?php

use Src\VO\TipoEquipamentoVO;
use Src\Controller\TipoEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_cadastrar'])){

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setNomeTipoEquipamento($_POST['tipo']);

    $ctrlTipoEq = new TipoEquipamentoCTRL();

    $ret = $ctrlTipoEq->CadastrarTipoEquipamentoCTRL($voTipoEq);

    
}

?>