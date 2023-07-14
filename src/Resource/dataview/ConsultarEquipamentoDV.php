<?php

use Src\Controller\ConsultaEquipamentoCTRL;
use Src\VO\EquipamentoVO;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if(isset($_POST['btn_buscar'])){

    $voConsultaEqPorTipo = new EquipamentoVO();
    $ctrlConsultaEqPorTipo = new ConsultaEquipamentoCTRL();

    $voConsultaEqPorTipo->setIdTipoEquipamento(intval($_POST['tipo']));

    $ret = $ctrlConsultaEqPorTipo->ConsultarEquipamentoCTRL($voConsultaEqPorTipo);


}

?>