<?php

use Src\_Public\Util;
use Src\VO\EquipamentoVO;
use Src\VO\AlocarVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;
use Src\Controller\SetorCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlTipo = new TipoEquipamentoCTRL();
$ctrlModelo = new ModeloEquipamentoCTRL();
$ctrlEq = new EquipamentoCTRL();
$ctrlSt = new SetorCTRL();

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
                        // zero se o equipamento não estiver alocado nem em manutenção, ou seja,
                        // se estiver desalocado
                        // somente pode ser inativado se estiver desalocado
                        if ($equipamentos[$i]['esta_alocado'] == 0) {
                            // situação: 1=ativo; 2=inativo
                            if ($equipamentos[$i]['situacao'] == 1) { ?>
                                        <a href="#"
                                            onclick="return CarregarInativar('<?= $equipamentos[$i]['equipamento_id'] ?>', '<?= $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'] ?>')"
                                            class="btn bg-gradient-info btn-xs" data-toggle="modal" data-target="#modalInativar"
                                            style="width: 60px">Inativar</a>
                        <?php } else { ?>
                                        <a href="#"
                                            onclick="return CarregarAtivar('<?= $equipamentos[$i]['equipamento_id'] ?>', '<?= $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'] ?>')"
                                            class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAtivar"
                                            style="width: 60px">Ativar</a>
                        <?php }
                        } else { ?>
                                    <button type="button" class="btn bg-secondary btn-xs" style="width: 60px"
                                        title="Somente é possível inativar equipamentos desalocados">Alocado</button>
                    <?php } ?>
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
                        $data = date('d-m-Y', $time);
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

<?php } else if (isset($_POST['filtrar_equipamentos_por_setor'])) {

    $idSetor = $_POST['idSetor'];

    $equipamentos = $ctrlEq->FiltrarEquipamentosPorSetorCTRL($idSetor);
    ?>
                    <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Equipamento</th>
                            <th>Data de alocação</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php for ($i = 0; $i < count($equipamentos); $i++) { 
            $equipSetor = 'Identificação: ' . $equipamentos[$i]['ident_equipamento'] . ' / ' . $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / Setor: ' . $equipamentos[$i]['nome_setor'];
            ?>
                            <tr>
                                <td>
                                    <a href="#"
                                        onclick="CarregarExcluirDesalocar('<?= $equipamentos[$i]['alocacaoID'] ?>','<?= $equipSetor ?>')"
                                        class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalExcluir"
                                        style="width: 60px">Desalocar</a>
                                </td>
                                <td>
                    <?= 'Identificação: ' . $equipamentos[$i]['ident_equipamento'] . ' / ' .
                        $equipamentos[$i]['tipo_equipamento'] . ' / ' .
                        $equipamentos[$i]['nome_modelo'] ?>
                                </td>
                                <td>
                    <?= $equipamentos[$i]['data_alocacao'] ?>
                                </td>
                            </tr>
        <?php } ?>
                    </tbody>

<?php } else if (isset($_POST['alocar_equipamento'])) {

    $equipamentoID = $_POST['equipamentoID'];
    $setorID = $_POST['setorID'];

    $voAloc = new AlocarVO();

    $voAloc->setIdEquipamento(intval($equipamentoID));
    $voAloc->setIdSetor(intval($setorID));
    $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);

    echo $ctrlEq->AlocarEquipamentoCTRL($voAloc);

} else if (isset($_POST['selecionar_equipamentos_nao_alocados'])) {

    $equipamentos = $ctrlEq->SelecionarEquipamentosNaoAlocadosCTRL();
    ?>
                            <option value="">Selecione</option>
        <?php
        foreach ($equipamentos as $item) { ?>
                                <option value="<?= $item['equipamentoID'] ?>">
            <?= 'Identificação: ' . $item['ident_equipamento'] . ' / ' .
                $item['tipo_equipamento'] . ' / ' .
                $item['nome_modelo'] ?>
                                </option>
    <?php }
} else if (isset($_GET['id'])) {

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

    if ($_POST['btn_excluir'] == DESALOCAR) {

        $alocacaoID = $_POST['equipamentoID'];

        $voAloc = new AlocarVO();

        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_DESALOCADO);
        $voAloc->setId(intval($alocacaoID));

        $ret = $ctrlEq->DesalocarEquipamentoCTRL($voAloc);

    } else {

        $equipamentoID = $_POST['equipamentoID'];

        $voEq = new EquipamentoVO();

        $voEq->setId((int) $equipamentoID);

        $ret = $ctrlEq->ExcluirEquipamentoCTRL($voEq);
    }

    if ($_POST['btn_excluir'] == 'ajx' || $_POST['btn_excluir'] == DESALOCAR) {
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