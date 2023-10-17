<?php

use Src\VO\SetorVO;
use Src\Controller\SetorCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlSetorEq = new SetorCTRL();
$filtro = "";
$filtroAtivado = false;

if (isset($_POST['btn_cadastrar'])) {

    $voSetorEq = new SetorVO();

    $voSetorEq->setNome($_POST['setor']);

    // consulta se o Setor já está cadastrado
    $ret = $ctrlSetorEq->FiltrarSetorCTRL($voSetorEq, "S");

    // se o Setor já estiver cadastrado
    if (count($ret) == 1) {

        $ret = -3;

    } else {

        $ret = $ctrlSetorEq->CadastrarSetorCTRL($voSetorEq);
    }

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    }

} elseif (isset($_POST['btn_alterar'])) {

    $setorOriginal = $_POST['setor_original_alterar'];
    $setor = $_POST['setor_alterar'];

    if ($setorOriginal == $setor) {
        $ret = -2;
    } else {

        $voSetorEq = new SetorVO();

        $voSetorEq->setId($_POST['id_setor_alterar']);
        $voSetorEq->setNome($setor);

        $ret = $ctrlSetorEq->AlterarSetorCTRL($voSetorEq);
    }

    if ($_POST['btn_alterar'] == 'ajx') {
        echo $ret;
    }

} elseif (isset($_POST['btn_excluir'])) {

    $voSetorEq = new SetorVO();

    $voSetorEq->setId($_POST['id_excluir']);

    $ret = $ctrlSetorEq->ExcluirSetorCTRL($voSetorEq);

    if ($_POST['btn_excluir'] == 'ajx') {
        echo $ret;
    }
}

if (isset($_POST['btn_filtrar'])) {

    $filtro = $_POST['filtroSetor'];

    if ($filtro != "") {

        $voSetorEq = new SetorVO();

        $voSetorEq->setNome($filtro);

        $setores = $ctrlSetorEq->FiltrarSetorCTRL($voSetorEq, "F");

        $filtroAtivado = true;

    } else {

        $setores = $ctrlSetorEq->ConsultarSetorCTRL();
        $filtroAtivado = false;

    }

    if ($_POST['btn_filtrar'] == 'ajx') {

        if (count($setores) > 0) {
            include_once PATH . 'view/adm/tabelas/SetorTABLE.php';
        } else {
            echo 'NADA';
        }
    }

} elseif (isset($_POST['btn_limparFiltro'])) {

    $filtro = "";
    $filtroAtivado = false;
    $setores = $ctrlSetorEq->ConsultarSetorCTRL();

    if (count($setores) == 0) {
        echo 'NADA';
    }

} elseif (isset($_POST['consultar_setor'])) {

    $setores = $ctrlSetorEq->ConsultarSetorCTRL();

    if ($_POST['consultar_setor'] == 'TABLE') {
        if (count($setores) > 0) {
            include_once PATH . 'view/adm/tabelas/SetorTABLE.php';
        } else {
            echo 'NADA';
        }
    } else { ?>
        <option value="" selected="selected">Selecione</option>
        <?php
        foreach ($setores as $item) { ?>
            <option value="<?= $item['id'] ?>"><?= $item['nome_setor'] ?></option>
        <?php }
    }
} elseif (isset($_POST['consultar_setores_com_equipamentos'])) {

    $setores = $ctrlSetorEq->ConsultarSetoresComEquipamentosCTRL();

    if (count($setores) > 0) { ?>
        <option value="" selected="selected">Selecione</option>
        <?php
        foreach ($setores as $item) { ?>
            <option value="<?= $item['setor_id'] ?>"><?= $item['nome_setor'] . ' - ' . $item['quantidade'] ?></option>
        <?php }
    } else {
        echo 'NADA';
    }
}

?>