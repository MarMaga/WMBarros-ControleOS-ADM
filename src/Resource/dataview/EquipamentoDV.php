<?php

use Src\_Public\Util;
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
$ctrlEq = new EquipamentoCTRL();

if (isset($_POST['btn_gravar']) && $_POST['btn_gravar'] == 'cadastrar') {

    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $identificacao = $_POST['identificacao'];
    $descricao = $_POST['descricao'];

    // verifica a existência do equipamento digitado no cadastro
    // confere apenas tipo, modelo e identificação. não confere a descrição
    $voEq = new EquipamentoVO();

    $voEq->setIdTipoEquipamento((int) $tipo);
    $voEq->setIdModelo(intval($modelo));
    $voEq->setIdentificacaoEquipamento(trim($identificacao));
    $voEq->setDescricaoEquipamento(trim($descricao));

    $ret = $ctrlEq->PesquisarEquipamentoCTRL($voEq, "C");

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

    if ($_POST['btn_gravar'] == 'ajx') {
        echo $ret;
    }

} else if (isset($_POST['consultar_tipo'])) {
    $tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();
    $idTipo = isset($titulo) ? ($titulo == ESTADO_TELA_ALTERAR ? $equipamento['tipoequipamento_id'] : '') : '';
    ?>

        <option value="" <?= ($tipoSelected == '') ? 'selected="selected"' : '' ?>>Selecione </option>
    <?php foreach ($tipos as $item) { ?>
            <option value="<?= $item['id'] ?>" <?= ($tipoSelected == $item['tipo_equipamento']) ? 'selected="selected"' : '' ?>>
            <?= $item['tipo_equipamento'] ?>
            </option>
    <?php }

} else if (isset($_POST['consultar_modelo'])) {
    $modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();
    $idModelo = isset($titulo) ? ($titulo == ESTADO_TELA_ALTERAR ? $equipamento['modelo_id'] : '') : '';
    ?>

            <option value="" <?= ($modeloSelected == '') ? 'selected="selected"' : '' ?>>Selecione </option>
    <?php foreach ($modelos as $item) { ?>
                <option value="<?= $item['id'] ?>" <?= $item['nome_modelo'] ?>         <?= ($modeloSelected == $item['nome_modelo']) ? 'selected="selected"' : '' ?>>
            <?= $item['nome_modelo'] ?>
                </option>
    <?php }

} else if (isset($_POST['filtrar_equipamentos'])) {
    $tipoId = $_POST['tipo'];
    $modeloId = $_POST['modelo'];

    $equipamentos = $ctrlEq->FiltrarEquipamentoCTRL($tipoId, $modeloId);
    ?>
                <thead>
                    <tr>
                        <th>Ação</th>
                        <th>Tipo</th>
                        <th>Modelo</th>
                        <th>Identificação</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                    </tr>
                </thead>
                <tbody>
        <?php for ($i = 0; $i < count($equipamentos); $i++) { ?>
                        <tr>
                            <td>
                                <a href="equipamento.php?id= <?= $equipamentos[$i]['equipamento_id'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                            </td>
                            <td><input type="hidden" name="id" id="id" value="<?= $equipamentos[$i]['equipamento_id'] ?>" />
                    <?= $equipamentos[$i]['tipo_equipamento'] ?>
                            </td>
                            <td>
                    <?= $equipamentos[$i]['nome_modelo'] ?>
                            </td>
                            <td>
                    <?= $equipamentos[$i]['ident_equipamento'] ?>
                            </td>
                            <td>
                    <?= $equipamentos[$i]['desc_equipamento'] ?>
                            </td>
                            <td>
                    <?= Util::MostrarSituacao($equipamentos[$i]['situacao']) ?>
                            </td>

                        </tr>
        <?php } ?>
                </tbody>

<?php } else if (isset($_GET['id'])){

    $equipamento = $ctrlEq->DetalharEquipamentoCTRL($_GET['id']);

    if(empty($equipamento))
        Util::ChamarPagina('consultar_equipamento');

} else if (isset($_POST['btn_gravar']) && $_POST['btn_gravar'] == 'alterar'){
    
    $equipamentoID = $_POST['equipamento_id'];
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $identificacao = $_POST['identificacao'];
    $descricao = $_POST['descricao'];

    $voEq = new EquipamentoVO();

    $voEq->setId((int) $equipamentoID);
    $voEq->setIdTipoEquipamento((int) $tipo);
    $voEq->setIdModelo(intval($modelo));
    $voEq->setIdentificacaoEquipamento(trim($identificacao));
    $voEq->setDescricaoEquipamento(trim($descricao));

    $ret = $ctrlEq->AlterarEquipamentoCTRL($voEq);

    if ($_POST['btn_gravar'] == 'ajx'){
        echo $ret;
    }
}

// CONSULTA TIPOS
//$tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();

// CONSULTA MODELOS
//$modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();

?>