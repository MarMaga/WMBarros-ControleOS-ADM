<?php

use Src\VO\TipoEquipamentoVO;
use Src\Controller\TipoEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

if (isset($_POST['btn_salvar'])) {

    $voTipoEq = new TipoEquipamentoVO();

    $inclusao = $_POST['novo'];

    $voTipoEq->setNomeTipoEquipamento($_POST['tipo']);

    $ctrlTipoEq = new TipoEquipamentoCTRL();

    if ($inclusao == 'S') {

        $ret = $ctrlTipoEq->CadastrarTipoEquipamentoCTRL($voTipoEq);

    } else {

        if ($_POST['h_tipo'] == $_POST['tipo']) {

            $ret = -2;

        } else {

            $voTipoEq->setIdTipoEquipamento($_POST['h_id_alt']);

            $ret = $ctrlTipoEq->AlterarTipoEquipamentoCTRL($voTipoEq);
        }
    }

} elseif (isset($_POST['btn_excluir'])) {

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setIdTipoEquipamento($_POST['h_id']);

    $ctrlTipoEq = new TipoEquipamentoCTRL();

    $ret = $ctrlTipoEq->ExcluirTipoEquipamentoCTRL($voTipoEq);

}

$sqlConsultaTodos = new TipoEquipamentoCTRL();
$tipos = $sqlConsultaTodos->ConsultarTodosTipoEquipamentoCTRL();

?>