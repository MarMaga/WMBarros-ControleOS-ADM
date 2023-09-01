<?php

use Src\VO\ModeloVO;
use Src\Controller\ModeloEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlModeloEq = new ModeloEquipamentoCTRL();
$filtro = "";
$filtroAtivado = false;

if (isset($_POST['btn_cadastrar'])) {

    $voModeloEq = new ModeloVO();

    $voModeloEq->setNomeModelo($_POST['modelo']);

    // consulta se o Modelo já está cadastrado
    $ret = $ctrlModeloEq->FiltrarModeloEquipamentoCTRL($voModeloEq, "S");

    // se o Modelo já estiver cadastrado
    if (count($ret) == 1) {

        $ret = -3;

    } else {

        $ret = $ctrlModeloEq->CadastrarModeloEquipamentoCTRL($voModeloEq);
    }

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }

} elseif (isset($_POST['btn_alterar'])) {

    $ModeloOriginal = $_POST['modelo_original_alterar'];
    $Modelo = $_POST['modelo_alterar'];

    if ($ModeloOriginal == $Modelo) {
        $ret = -2;
    } else {

        $voModeloEq = new ModeloVO();

        $voModeloEq->setIdModelo($_POST['id_modelo_alterar']);
        $voModeloEq->setNomeModelo($Modelo);

        $ret = $ctrlModeloEq->AlterarModeloEquipamentoCTRL($voModeloEq);
    }

    if ($_POST['btn_alterar'] == 'ajx') {
        echo $ret;
    }

} elseif (isset($_POST['btn_excluir'])) {

    $voModeloEq = new ModeloVO();

    $voModeloEq->setIdModelo($_POST['id_excluir']);

    $ret = $ctrlModeloEq->ExcluirModeloEquipamentoCTRL($voModeloEq);

    if ($_POST['btn_excluir'] == 'ajx') {
        echo $ret;
    }
}

if (isset($_POST['btn_filtrar'])) {

    $filtro = $_POST['filtroModelo'];

    if ($filtro != "") {

        $voModeloEq = new ModeloVO();

        $voModeloEq->setNomeModelo($filtro);

        $modelos = $ctrlModeloEq->FiltrarModeloEquipamentoCTRL($voModeloEq, "F");

        $filtroAtivado = true;

    } else {

        $modelos = $ctrlModeloEq->ConsultarModeloEquipamentoCTRL();
        $filtroAtivado = false;

    }

    if ($_POST['btn_filtrar'] == 'ajx') {

        if (count($modelos) > 0) {
            include_once PATH . 'view/adm/tabelas/ModeloEquipamentoTABLE.php';
        } else {
            echo 'NADA';
        }
    }

} elseif (isset($_POST['btn_limparFiltro'])) {

    $filtro = "";
    $filtroAtivado = false;
    $modelos = $ctrlModeloEq->ConsultarModeloEquipamentoCTRL();

    if (count($modelos) == 0) {
        echo 'NADA';
    }

} elseif (isset($_POST['consultar_modelo'])) {

    $modelos = $ctrlModeloEq->ConsultarModeloEquipamentoCTRL();

    if (count($modelos) > 0) {
        include_once PATH . 'view/adm/tabelas/ModeloEquipamentoTABLE.php';
    } else {
        echo 'NADA';
    }
}

?>