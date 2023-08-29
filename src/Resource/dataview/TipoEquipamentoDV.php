<?php

use Src\VO\TipoEquipamentoVO;
use Src\Controller\TipoEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlTipoEq = new TipoEquipamentoCTRL();
$filtro = "";
$filtroAtivado = false;
$tipos[] = "";

if (isset($_POST['btn_cadastrar'])) {

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setNomeTipoEquipamento($_POST['tipo']);

    // consulta se o tipo já está cadastrado
    $ret = $ctrlTipoEq->FiltrarTipoEquipamentoCTRL($voTipoEq, "S");

    // se o tipo já estiver cadastrado
    if (count($ret) == 1) {

        $ret = -3;

    } else {

        $ret = $ctrlTipoEq->CadastrarTipoEquipamentoCTRL($voTipoEq);

    }

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }

} elseif (isset($_POST['btn_alterar'])) {

    $tipoOriginal = $_POST['tipo_original_alterar'];
    $tipo = $_POST['tipo_alterar'];

    if ($tipoOriginal == $tipo) {
        $ret = -2;
    } else {

        $voTipoEq = new TipoEquipamentoVO();

        $voTipoEq->setIdTipoEquipamento($_POST['id_tipo_alterar']);
        $voTipoEq->setNomeTipoEquipamento($tipo);

        $ret = $ctrlTipoEq->AlterarTipoEquipamentoCTRL($voTipoEq);
    }

    if ($_POST['btn_alterar'] == 'ajx') {
        echo $ret;
    }

} elseif (isset($_POST['btn_excluir'])) {

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setIdTipoEquipamento($_POST['id_excluir']);

    $ret = $ctrlTipoEq->ExcluirTipoEquipamentoCTRL($voTipoEq);

    if ($_POST['btn_excluir'] == 'ajx') {
        echo $ret;
    }
}

if (isset($_POST['btn_filtrar'])) {

    $filtro = $_POST['filtroTipo'];

    if ($filtro != "") {

        $voTipoEq = new TipoEquipamentoVO();

        $voTipoEq->setNomeTipoEquipamento($filtro);

        $tipos = $ctrlTipoEq->FiltrarTipoEquipamentoCTRL($voTipoEq, "F");

        $filtroAtivado = true;

    } else {

        $tipos = $ctrlTipoEq->ConsultarTipoEquipamentoCTRL();
        $filtroAtivado = false;

    }

    if ($_POST['btn_filtrar'] == 'ajx') {

        if (count($tipos) > 0) {
            include_once PATH . 'view/adm/tabelas/TipoEquipamentoTABLE.php';
        } else {
            echo 'NADA';
        }
    }

} elseif (isset($_POST['btn_limparFiltro'])) {

    $filtro = "";
    $filtroAtivado = false;
    $tipos = $ctrlTipoEq->ConsultarTipoEquipamentoCTRL();

    if (count($tipos) == 0) {
        echo 'NADA';
    }

} elseif (isset($_POST['consultar_tipo'])) {

    $tipos = $ctrlTipoEq->ConsultarTipoEquipamentoCTRL();

    if (count($tipos) > 0) {
        include_once PATH . 'view/adm/tabelas/TipoEquipamentoTABLE.php';
    } else {
        echo 'NADA';
    }
} 