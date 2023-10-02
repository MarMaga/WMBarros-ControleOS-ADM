<?php

use Src\_Public\Util;
use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

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
    // se já está cadastrado
    if (count($ret) == 1) {

        $ret[0]['desc_equipamento'] != $descricao ? $ret = -4 : $ret = -3;
        // -4: Registro já cadastrado com outra descrição
        // -3: Registro já cadastrado
    } else {
        $ctrlEq->CadastrarEquipamentoCTRL($voEq);
    }

    if ($_POST['btn_gravar'] != '') {
        echo $ret;
    }

} else if (isset($_POST['consultar_tipo'])) {
    $tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();
    $idTipo = isset($_POST['tipo_id']) ? $_POST['tipo_id'] : '';
    ?>

        <option value="">Selecione </option>
    <?php foreach ($tipos as $item) { ?>
            <option <?= $idTipo == $item['id'] ? 'selected ' : '' ?> value="<?= $item['id'] ?>">
            <?= $item['tipo_equipamento'] ?>
            </option>
    <?php }

} else if (isset($_POST['consultar_modelo'])) {
    $modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();
    $idModelo = isset($_POST['modelo_id']) ? $_POST['modelo_id'] : '';
    ?>

            <option value="">Selecione </option>
    <?php foreach ($modelos as $item) { ?>
                <option <?= $idModelo == $item['id'] ? 'selected ' : '' ?> value="<?= $item['id'] ?>" <?= $item['nome_modelo'] ?>>
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
                                <a href="equipamento.php?id=<?= $equipamentos[$i]['equipamento_id'] ?>"
                                    class="btn btn-warning btn-xs">Alterar</a>
                    <?php
                    echo $equipamentos[$i]['esta_alocado'];
                    if ($equipamentos[$i]['esta_alocado'] == 0) {
                    if ($equipamentos[$i]['situacao'] == 1) { ?>
                                    <a href="#"
                                        onclick="return CarregarInativar('<?= $equipamentos[$i]['equipamento_id'] ?>', '<?= $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'] ?>')"
                                        class="btn bg-gradient-info btn-xs" data-toggle="modal" data-target="#modalInativar"
                                        style="width: 50px">Inativar</a>
                    <?php } else { ?>
                                    <a href="#"
                                        onclick="return CarregarAtivar('<?= $equipamentos[$i]['equipamento_id'] ?>', '<?= $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'] ?>')"
                                        class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAtivar"
                                        style="width: 50px">Ativar</a>
                    <?php } } ?>
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
                    <?php if (Util::MostrarSituacao($equipamentos[$i]['situacao']) == 'ATIVO') {
                        echo 'ATIVO';
                    } else { 
                        $eq = $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'];
                        $time = strtotime($equipamentos[$i]['data_descarte']);
                        $data = date('d-m-Y',$time);
                        $motivo = $equipamentos[$i]['motivo_descarte'];
                        ?>
                                    <a href="#" data-toggle="modal" data-target="#modalDadosInativo"
                                        onclick="return CarregarDadosInativo('<?= $eq ?>','<?= $data ?>','<?= $motivo ?>')">
                            <?= Util::MostrarSituacao($equipamentos[$i]['situacao']) ?>
                                    </a>
                    <?php } ?>
                            </td>
                        </tr>
        <?php } ?>
                </tbody>

<?php } else if (isset($_GET['id'])) {

    if (!is_numeric($_GET['id']))
        Util::ChamarPagina('consultar_equipamento');

    $equipamento = $ctrlEq->DetalharEquipamentoCTRL($_GET['id']);

    if (empty($equipamento))
        Util::ChamarPagina('consultar_equipamento');

} else if (isset($_POST['btn_gravar']) && $_POST['btn_gravar'] == 'alterar') {

    $equipamentoID = $_POST['id'];
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

    $ret = $ctrlEq->PesquisarEquipamentoCTRL($voEq, "C");

    if (count($ret) == 1) {

        $ret[0]['desc_equipamento'] != $descricao ? $ret = -4 : $ret = -3;
        // -4: Registro já cadastrado com outra descrição
        // -3: Registro já cadastrado
    } else {
        $ret = $ctrlEq->AlterarEquipamentoCTRL($voEq);
    }

    if ($_POST['btn_gravar'] != '') {
        echo $ret;
    }

} else if (isset($_POST['btn_excluir'])) {

    $equipamentoID = $_POST['equipamentoID'];

    $voEq = new EquipamentoVO();

    $voEq->setId((int) $equipamentoID);

    $ret = $ctrlEq->ExcluirEquipamentoCTRL($voEq);

    if ($_POST['btn_excluir'] == 'ajx') {
        echo $ret;
    }

} else if (isset($_POST['btn_inativar']) || isset($_POST['btn_ativar'])) {

    $equipamentoID = $_POST['equipamentoID'];

    $voEq = new EquipamentoVO();

    $voEq->SetId((int) $equipamentoID);

    if (isset($_POST['btn_inativar'])) {

        $voEq->setSituacao(0);
        $voEq->setDataDescarte($_POST['dataInativar']);
        $voEq->setMotivoDescarte($_POST['motivoInativar']);

    } else {

        $voEq->setSituacao(1);
        $voEq->setDataDescarte('');
        $voEq->setMotivoDescarte('');

    }

    $ret = $ctrlEq->AtivarInativarEquipamentoCTRL($voEq);

    echo $ret;
}

// CONSULTA TIPOS
//$tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();

// CONSULTA MODELOS
//$modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();

?>