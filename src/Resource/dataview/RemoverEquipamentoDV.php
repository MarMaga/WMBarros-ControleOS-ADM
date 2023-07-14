<?php
use Src\Controller\RemoverEquipamentoCTRL;
use Src\VO\AlocarVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['setor'])){

    $voRemover = new AlocarVO();
    $ctrlRemover = new RemoverEquipamentoCTRL();

    $voRemover->setIdSetor(intval($_POST['setor']));

    $ret = $ctrlRemover->Remover($voRemover);


}

?>