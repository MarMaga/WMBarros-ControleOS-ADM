<?php

use Src\VO\TipoEquipamentoVO;
use Src\VO\ModeloVO;
use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$tipoSelected = '';
$modeloSelected = '';
$identificacao = '';
$descricao = '';

$ctrlTipo = new TipoEquipamentoCTRL();
$ctrlModelo = new ModeloEquipamentoCTRL();

if (isset($_POST['btn_cadastrar'])) {

    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $identificacao = $_POST['identificacao'];
    $descricao = $_POST['descricao'];

    // busca o ID do tipo
    //$tipo = $_POST['tipo'];

    //$tipoVO = new TipoEquipamentoVO();

    //$tipoVO->setNomeTipoEquipamento($tipo);

    //$idTipo = $ctrlTipo->FiltrarTipoEquipamentoCTRL($tipoVO, "C")[0]['id'];

    // busca o ID do modelo
    //$modelo = $_POST['modelo'];

    //$modeloVO = new ModeloVO();

    //$modeloVO->setNomeModelo($modelo);

    //$idModelo = $ctrlModelo->FiltrarModeloEquipamentoCTRL($modeloVO, "C")[0]['id'];

    // verifica a existência do equipamento digitado no cadastro
    // confere apenas tipo, modelo e identificação. não confere a descrição
    $voEq = new EquipamentoVO();
    $ctrlEq = new EquipamentoCTRL();

    $voEq->setIdTipoEquipamento((int) $tipo);
    $voEq->setIdModelo(intval($modelo));
    $voEq->setIdentificacaoEquipamento(trim($identificacao));
    $voEq->setDescricaoEquipamento(trim($descricao));

    $ret = $ctrlEq->FiltrarEquipamentoCTRL($voEq, "C");

    if (count($ret) == 1) {

        if ($ret[0]['desc_equipamento'] != $descricao) {

            $ret = -4; // Registro já cadastrado com outra descrição

        } else {

            $ret = -3; // Registro já cadastrado
        }

    } else {

        $ctrlEq->CadastrarEquipamentoCTRL($voEq);

        $tipoSelected = '';
        $modeloSelected = '';
        $identificacao = '';
        $descricao = '';

        $ret = 1;

    }
}

if (isset($_POST['consultar_tipo'])) {
    $tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();
    ?>

    <option value="" <?= ($tipoSelected == '') ? 'selected="selected"' : '' ?>>Selecione </option>
    <?php foreach ($tipos as $item) { ?>
        <option value="<?= $item['tipo_equipamento'] ?>" <?= ($tipoSelected == $item['tipo_equipamento']) ? 'selected="selected"' : '' ?>>
            <?= $item['tipo_equipamento'] ?></option>
    <?php }
}

if (isset($_POST['consultar_modelo'])) {
    $modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();
    ?>

    <option value="" <?= ($modeloSelected == '') ? 'selected="selected"' : '' ?>>Selecione </option>
    <?php foreach ($modelos as $item) { ?>
        <option value="<?= $item['nome_modelo'] ?>" <?= $item['nome_modelo'] ?>         <?= ($modeloSelected == $item['nome_modelo']) ? 'selected="selected"' : '' ?>><?= $item['nome_modelo'] ?></option>
    <?php }
}

// CONSULTA TIPOS
//$tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();

// CONSULTA MODELOS
//$modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();

?>