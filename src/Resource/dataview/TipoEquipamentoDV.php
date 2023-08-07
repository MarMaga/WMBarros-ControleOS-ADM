<?php

use Src\VO\TipoEquipamentoVO;
use Src\Controller\TipoEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlTipoEq = new TipoEquipamentoCTRL();

if (isset($_POST['btn_cadastrar'])) {

    $voTipoEq = new TipoEquipamentoVO();

    $inclusao = $_POST['novo'];

    $voTipoEq->setNomeTipoEquipamento($_POST['tipo']);

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

} elseif(isset($_POST['btn_alterar'])){
    
    $tipoOriginal = $_POST['tipo_original_alterar'];
    $tipo = $_POST['tipo_alterar'];

    if($tipoOriginal == $tipo){
        $ret = -2;
    }

    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setIdTipoEquipamento($_POST['id_tipo_alterar']);
    $voTipoEq->setNomeTipoEquipamento($tipo);

    $ret = $ctrlTipoEq->AlterarTipoEquipamentoCTRL($voTipoEq);

} elseif (isset($_POST['btn_excluir'])) {
    
    $voTipoEq = new TipoEquipamentoVO();

    $voTipoEq->setIdTipoEquipamento($_POST['h_id']);

    $ret = $ctrlTipoEq->ExcluirTipoEquipamentoCTRL($voTipoEq);
}

$tipos = $ctrlTipoEq->ConsultarTipoEquipamentoCTRL();

?>