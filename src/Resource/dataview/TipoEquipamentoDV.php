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
    }

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setIdTipoEquipamento($_POST['id_tipo_alterar']);
    $voTipoEq->setNomeTipoEquipamento($tipo);

    $ret = $ctrlTipoEq->AlterarTipoEquipamentoCTRL($voTipoEq);

    if($_POST['']){}

} elseif (isset($_POST['btn_excluir'])) {

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setIdTipoEquipamento($_POST['id_excluir']);

    $ret = $ctrlTipoEq->ExcluirTipoEquipamentoCTRL($voTipoEq);

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

} elseif (isset($_POST['btn_limparFiltro'])) {

    $filtro = "";
    $filtroAtivado = false;
    $tipos = $ctrlTipoEq->ConsultarTipoEquipamentoCTRL();

} elseif (isset($_POST['consultar_tipo'])) {

    $tipos = $ctrlTipoEq->ConsultarTipoEquipamentoCTRL();

    ?>

    <thead>
        <tr>
            <th>Ação</th>
            <th>Tipo do equipamento</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($tipos); $i++) { ?>
            <tr>
                <td>
                    <a href="#"
                        onclick="return ModalAlterarTipoEquipamento('<?= $tipos[$i]['id'] ?>', '<?= $tipos[$i]['tipo_equipamento'] ?>')"
                        class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterarTipo">Alterar</a>
                    <a href="#"
                        onclick="return CarregarExcluir('<?= $tipos[$i]['id'] ?>', '<?= $tipos[$i]['tipo_equipamento'] ?>')"
                        class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalExcluir">Excluir</a>
                </td>
                <td>
                    <input type="hidden" name="id" id="id" value="<?= $tipos[$i]['id'] ?>" />
                    <?= $tipos[$i]['tipo_equipamento'] ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>

<?php } ?>