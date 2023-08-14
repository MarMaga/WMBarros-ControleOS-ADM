<?php

use Src\VO\ModeloVO;
use Src\VO\TipoEquipamentoVO;
use Src\VO\EquipamentoVO;
use Src\Controller\ConsultaEquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$tipoSelected = '';

$ctrlTipo = new TipoEquipamentoCTRL();

if(isset($_POST['btn_buscar'])){

    $tipoSelected = $_POST['tipo'];
    
    // busca o ID do tipo
    $tipo = $_POST['tipo'];

    $tipoVO = new TipoEquipamentoVO();

    $tipoVO->setIdTipoEquipamento($tipo);

    $idTipo = $ctrlTipo->FiltrarTipoEquipamentoCTRL($tipoVO, "C")[0]['id'];



    $voConsultaEqPorTipo = new EquipamentoVO();
    $ctrlConsultaEqPorTipo = new ConsultaEquipamentoCTRL();

    $voConsultaEqPorTipo->setIdTipoEquipamento(intval($_POST['tipo']));

    $ret = $ctrlConsultaEqPorTipo->ConsultarEquipamentoCTRL($voConsultaEqPorTipo);


}

$tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();

?>