<?php

use Src\VO\ModeloVO;
use Src\Controller\ModeloEquipamentoCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlModeloEq = new ModeloEquipamentoCTRL();
$filtro = "";
$filtroAtivado = false;

if (isset($_POST['btn_cadastrar'])) {

    $voModeloEq = new ModeloVO();

    $inclusao = $_POST['novo'];

    $voModeloEq->setNomeModelo($_POST['modelo']);

    // consulta se o Modelo já está cadastrado
    $ret = $ctrlModeloEq->FiltrarModeloEquipamentoCTRL($voModeloEq, "S");

    // se o Modelo já estiver cadastrado
    if (count($ret) == 1) {

        $ret = -3;

    } else {

        if ($inclusao == 'S') {

            $ret = $ctrlModeloEq->CadastrarModeloEquipamentoCTRL($voModeloEq);

        } else {

            if ($_POST['h_Modelo'] == $_POST['Modelo']) {

                $ret = -2;

            } else {

                $voModeloEq->setNomeModelo($_POST['h_id_alt']);

                $ret = $ctrlModeloEq->AlterarModeloEquipamentoCTRL($voModeloEq);
            }
        }
    }

} elseif (isset($_POST['btn_alterar'])) {

    $ModeloOriginal = $_POST['Modelo_original_alterar'];
    $Modelo = $_POST['Modelo_alterar'];

    if ($ModeloOriginal == $Modelo) {
        $ret = -2;
    }

    $voModeloEq = new ModeloVO();

    $voModeloEq->setIdModelo($_POST['id_Modelo_alterar']);
    $voModeloEq->setNomeModelo($Modelo);

    $ret = $ctrlModeloEq->AlterarModeloEquipamentoCTRL($voModeloEq);

} elseif (isset($_POST['btn_excluir'])) {

    $voModeloEq = new ModeloVO();

    $voModeloEq->setIdModelo($_POST['id_Modelo_excluir']);

    $ret = $ctrlModeloEq->ExcluirModeloEquipamentoCTRL($voModeloEq);

}

if (isset($_POST['btn_filtrar'])) {

    $filtro = $_POST['filtroModelo'];

    if ($filtro != "") {

        $voModeloEq = new ModeloVO();

        $voModeloEq->setNomeModelo($filtro);

        $Modelos = $ctrlModeloEq->FiltrarModeloEquipamentoCTRL($voModeloEq, "F");

        $filtroAtivado = true;

    } else {

        $Modelos = $ctrlModeloEq->ConsultarModeloEquipamentoCTRL();
        $filtroAtivado = false;
        
    }    

} elseif (isset($_POST['btn_limparFiltro'])) {

    $filtro = "";
    $filtroAtivado = false;
    $Modelos = $ctrlModeloEq->ConsultarModeloEquipamentoCTRL();

} else {

    $Modelos = $ctrlModeloEq->ConsultarModeloEquipamentoCTRL();

}

?>