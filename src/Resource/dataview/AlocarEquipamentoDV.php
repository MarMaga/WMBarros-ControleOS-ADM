<?php

use Src\_Public\Util;
use Src\VO\AlocarVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\AlocarEquipamentoCTRL;
use Src\Controller\SetorCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$ctrlEq = new EquipamentoCTRL();
$ctrlSt = new SetorCTRL();

if (isset($_POST['inserir_alterar_alocacao'])){

    $equipamentoID = $_POST['equipamento_id'];
    $setor_id = $_POST['setor_id'];
    $novo_setor_id = $_POST['novo_setor_id'];

    $voAloc = new AlocarVO();
    $ctrlAloc = new AlocarEquipamentoCTRL();

    $voAloc->setIDEquipamento(intval($equipamentoID));
    
    if ($setor_id == 0 || $setor_id == ''){
        // setor_id == 0 ou == '' se não houver cadastro do equipamento em tb_alocacao
        // neste caso, deve inserir um registro novo
        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);
        $voAloc->setIDSetor(intval($novo_setor_id));

        echo $ctrlAloc->AlocarCTRL($voAloc);

    } else {
        // setor_id > 0 quando já houver registro de alocação deste equipamento
        // se o último registro deste equipamento conter data_remocao, deve inserir outro registro

        if($novo_setor_id > 0) {
        // $novo_setor_id > 0 quando está desalocado e o usuário escolhe outro setor (>0)
        // deve inserir outro registro

            $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);
            $voAloc->setIDSetor(intval($novo_setor_id));

            echo $ctrlAloc->AlocarCTRL($voAloc);

        } else {
        // neste caso, deve alterar o registro existente

            $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_DESALOCADO);
            $voAloc->setIDSetor(intval($setor_id));

            echo $ctrlAloc->DesalocarCTRL($voAloc);
        }
    }

    if($novo_setor_id == 0) {
        // quando estiver desalocando, não muda o setor (envia o mesmo)
        // situação: 1=alocado, 2=desalocado, 3=manutenção
        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_DESALOCADO);
        $voAloc->setIDSetor(intval($setor_id));
        $lancaDataAlocacaoRemocao = 'R';

    } else {
        // quando estiver alocando, muda o setor
        // situação: 1=alocado, 2=desalocado, 3=manutenção
        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);
        $voAloc->setIDSetor(intval($novo_setor_id));
        $lancaDataAlocacaoRemocao = 'A';
    }
    
} else if (isset($_POST['listar_equipamentos_alocacao'])) {

    $tipoId = '';
    $modeloId = '';

    if(isset($_POST['tipo'])) {
        $tipoId = $_POST['tipo'];
        $modeloId = $_POST['modelo'];
    }

    $equipamentos = $ctrlEq->ListarEquipamentoAlocacaoCTRL($tipoId, $modeloId);
    $setores = $ctrlSt->ConsultarSetorCTRL();

    ?>
    <thead>
    <tr>
    <th>Ação</th>
    <th>Equipamento</th>
    <th>Setor</th>
    <th>Desde</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($equipamentos); $i++) { ?>
        <tr>
        <?php
        $eqID = $equipamentos[$i]['id'];
        $setorID = $equipamentos[$i]['setor_id'];
        $dataAlo = $equipamentos[$i]['data_alocacao'];
        $dataRem = $equipamentos[$i]['data_remocao'];
        $tipo = $equipamentos[$i]['tipo_equipamento'];
        $modelo = $equipamentos[$i]['nome_modelo'];
        $ident = $equipamentos[$i]['ident_equipamento'];
        $colDesde = ''; ?>

        <td style="vertical-align: middle">
            <?php
            // 1=ativo; 0=inativo
            if ($equipamentos[$i]['ativo'] == SITUACAO_INATIVO) { ?>

                <label class="text-danger">INATIVO</label>
                <?php 
                $time = strtotime($equipamentos[$i]['data_descarte']);
                $colDesde = date('d-m-Y', $time);

            } else {
            // se o equipamento estiver ATIVO

                // 1=alocado; 2=desalocado; 3=manutenção
                if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_MANUTENCAO) { ?>

                    <label class="text-info">Em manutenção</label>

                <!-- se estiver alocado ou desalocado, cria e não mostra o botão Alterar -->
                <?php } else { ?>

                    <span id="altere<?= $eqID ?>">Altere o setor</span>

                    <a href="#" hidden id="btn<?= $eqID ?>"
                    onclick="CarregarAlocacao('<?= $eqID ?>','<?= $setorID ?>','<?= 'alt' . $eqID ?>','<?= $tipo . ' / ' . $modelo . ' / ' . $ident ?>')"
                    class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAloc"
                    style="width: 50px">Alterar</a>

                <?php }
            } ?>
        </td>

        <td style="vertical-align: middle">

            <input type="hidden" name="equipamento_id" id="equipamento_id" value="<?= $eqID ?>" />

            <?= $tipo . ' / ' . $modelo . ' / ' . $ident ?>
                
        </td>

        <td>
            <?php
            if ($equipamentos[$i]['ativo'] == SITUACAO_ATIVO) {

                if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_MANUTENCAO) {

                    foreach($setores as $setor) { ?>

                        <?php if ($setor['id'] == $setorID) { ?>

                            <select disabled class="form-control select2">
                            <option selected><?= $setor['nome_setor'] ?></option>
                            </select>

                        <?php } 

                    } ?>

                <?php } else if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_DESALOCADO) { ?>

                    <select class="form-control select2" name="alt<?= $eqID ?>" id="alt<?= $eqID ?>" onchange="AtivaInativaBotaoAlocacao('btn<?= $eqID ?>','<?= $setorID == '' ? 0 : $setorID ?>','<?= 'alt' . $eqID ?>','altere<?= $eqID ?>')">
                    <option selected value="0">Desalocado</option>

                    <?php foreach($setores as $setor) { ?>
                        <option value="<?= $setor['id'] ?>"><?= $setor['nome_setor'] ?></option>
                    <?php } ?>

                    </select>
                    
                <?php } else { ?>

                    <select class="form-control select2" name="alt<?= $eqID ?>" id="alt<?= $eqID ?>" onchange="AtivaInativaBotaoAlocacao('btn<?= $eqID ?>','<?= $setorID == '' ? 0 : $setorID ?>','<?= 'alt' . $eqID ?>','altere<?= $eqID ?>')">

                    <?php $alocado = false;

                    foreach($setores as $setor) {

                        if ($setor['id'] == $setorID) { ?>

                            <option value="0">Desalocar</option>
                            <option selected value="<?= $setor['id'] ?>"><?= $setor['nome_setor'] ?></option>

                            <?php $alocado = true;

                        }
                    }

                    if (!$alocado) { ?>

                        <option value="0">Desalocado</option>

                        <?php foreach($setores as $setor) { ?>

                            <option value="<?= $setor['id'] ?>"><?= $setor['nome_setor'] ?></option>

                        <?php }
                    } ?>

                    </select>

                <?php }
            } ?>
        </td>

        <td style="vertical-align: middle">
            <?php

            if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_ALOCADO) {
                        
                $time = strtotime($dataAlo);
                $colDesde = date('d-m-Y', $time);

            } else if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_DESALOCADO && !empty($dataRem)) {

                $time = strtotime($dataRem);
                $colDesde = date('d-m-Y', $time);

            } else {
            // se não existe cadastro em tb_alocacao
            // e se não está em manutenção

                if ($equipamentos[$i]['ativo'] == SITUACAO_ATIVO && $equipamentos[$i]['situacao_alocacao'] != SITUACAO_EQUIPAMENTO_MANUTENCAO) {
                    $colDesde = 'Nunca foi alocado';
                }
            } ?>

            <span><?= $colDesde ?></span>
            
        </td>

    <?php } ?>
    </tr>
<?php } ?>
</tbody>