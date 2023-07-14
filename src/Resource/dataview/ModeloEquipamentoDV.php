<?php

use Src\VO\ModeloVO;
use Src\Controller\ModeloEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_cadastrar'])){
    
    $voMod = new ModeloVO();
    $ctrlMod = new ModeloEquipamentoCTRL();

    $voMod->setNomeModelo($_POST['nome']);

    $ret = $ctrlMod->CadastrarModeloEquipamentoCTRL($voMod);


}

?>