<?php

use Src\VO\AlocarVO;
use Src\Controller\AlocarEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_gravar'])){

    $voAloc = new AlocarVO();
    $ctrlAloc = new AlocarEquipamentoCTRL();

    $voAloc->setIdEquipamento(intval($_POST['equipamento']));
    $voAloc->setIdSetor(intval($_POST['setor']));

    $ret = $ctrlAloc->Alocar($voAloc);

}

?>