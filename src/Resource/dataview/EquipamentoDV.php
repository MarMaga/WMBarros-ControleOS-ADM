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

if(isset($_POST['btn_cadastrar'])){

    $tipoSelected = $_POST['tipo'];
    $modeloSelected = $_POST['modelo'];
    $identificacao = $_POST['identificacao'];
    $descricao = $_POST['descricao'];
    
    // busca o ID do tipo
    $tipo = $_POST['tipo'];
    
    $tipoVO = new TipoEquipamentoVO();

    $tipoVO->setNomeTipoEquipamento($tipo);

    $idTipo = $ctrlTipo->FiltrarTipoEquipamentoCTRL($tipoVO, "C")[0]['id'];

    // busca o ID do modelo
    $modelo = $_POST['modelo'];

    $modeloVO = new ModeloVO();

    $modeloVO->setNomeModelo($modelo);

    $idModelo = $ctrlModelo->FiltrarModeloEquipamentoCTRL($modeloVO, "C")[0]['id'];

    // verifica a existência do equipamento digitado no cadastro
    // confere apenas tipo, modelo e identificação. não confere a descrição
    $voEq = new EquipamentoVO();
    $ctrlEq = new EquipamentoCTRL();
    
    $voEq->setIdTipoEquipamento((int)$idTipo);
    $voEq->setIdModelo(intval($idModelo));
    $voEq->setIdentificacaoEquipamento(trim($_POST['identificacao']));
    $voEq->setDescricaoEquipamento(trim($_POST['descricao']));

    $ret = $ctrlEq->FiltrarEquipamentoCTRL($voEq, "C");

    if(count($ret) == 1){
        
        $ret = -3; // Registro já cadastrado

    } else {

        $ctrlEq->CadastrarEquipamentoCTRL($voEq);
        
        $ret = 1;

    }
}

// CONSULTA TIPOS
$tipos = $ctrlTipo->ConsultarTipoEquipamentoCTRL();

// CONSULTA MODELOS
$modelos = $ctrlModelo->ConsultarModeloEquipamentoCTRL();

?>