<?php

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

    $voAloc->setIdEquipamento(intval($equipamentoID));
    
    if($novo_setor_id == 0) {
        // quando estiver desalocando, não muda o setor (envia o mesmo)
        // situação: 1=alocado, 2=desalocado, 3=manutenção
        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_DESALOCADO);
        $voAloc->setIdSetor(intval($setor_id));
        $lancaDataAlocacaoRemocao = 'R';

    } else {
        // quando estiver alocando, muda o setor
        // situação: 1=alocado, 2=desalocado, 3=manutenção
        $voAloc->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);
        $voAloc->setIdSetor(intval($novo_setor_id));
        $lancaDataAlocacaoRemocao = 'A';
    }
    
    if ($setor_id == 0){
        // setor_id == 0 se não houver cadastro do equipamento em tb_alocacao
        // neste caso, deve inserir um registro novo
        return $ctrlAloc->InserirAlocacaoCTRL($voAloc);

    } else {
        // setor_id > 0 quando já houver registro de alocação deste equipamento
        // neste caso, deve alterar o registro existente

        return $ctrlAloc->AlterarAlocacaoCTRL($voAloc, $lancaDataAlocacaoRemocao);
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
        // 1=ativo; 0=inativo
        // mostra apenas os equipamentos ativos
        if ($equipamentos[$i]['ativo'] == SITUACAO_ATIVO) { ?>            
            <td style="vertical-align: middle">
                <?php
                // 1=alocado; 2=desalocado; 3=manutenção
                if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_MANUTENCAO) { ?>
                    <label>Em manutenção</label>
                <!-- se estiver alocado ou desalocado, mostra o botão Alterar -->
                <?php } else { 
                    $eqID = $equipamentos[$i]['id'];
                    $data = '';
                    if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_ALOCADO && !empty($equipamentos[$i]['data_alocacao'])) {
                        $time = strtotime($equipamentos[$i]['data_alocacao']);
                        $data = date('d-m-Y', $time);
                    } else if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_DESALOCADO && !empty($equipamentos[$i]['data_remocao'])) {
                        $time = strtotime($equipamentos[$i]['data_remocao']);
                        $data = date('d-m-Y', $time);
                    } ?>
                    <a href="#" hidden id="btn<?= $equipamentos[$i]['id'] ?>"
                    onclick="CarregarAlocacao('<?= $equipamentos[$i]['id'] ?>','<?= $equipamentos[$i]['setor_id'] ?>','<?= 'alt' . $equipamentos[$i]['id'] ?>','<?= $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'] ?>')"
                    class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAloc"
                    style="width: 50px">Alterar</a>
                <?php } ?>
            </td>
            <td style="vertical-align: middle">
                <input type="hidden" name="equipamento_id" id="setor_id" value="<?= $eqID ?>" />
                        <?= $equipamentos[$i]['tipo_equipamento'] . ' / ' . $equipamentos[$i]['nome_modelo'] . ' / ' . $equipamentos[$i]['ident_equipamento'] ?>
            </td>
            <td>
                <?php if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_MANUTENCAO) {
                    foreach($setores as $setor) { ?>
                        <?php if ($setor['id'] == $equipamentos[$i]['setor_id']) { ?>
                            <select disabled class="form-control select2">
                            <option selected><?= $setor['nome_setor'] ?></option>
                            </select>
                        <?php } 
                    } ?>
                <?php } else if ($equipamentos[$i]['situacao_alocacao'] == SITUACAO_EQUIPAMENTO_DESALOCADO) { ?>
                    <select class="form-control select2" name="alt<?= $equipamentos[$i]['id'] ?>" id="alt<?= $equipamentos[$i]['id'] ?>" onchange="AtivaInativaBotaoAlocacao('btn<?= $equipamentos[$i]['id'] ?>','<?= $equipamentos[$i]['setor_id'] == '' ? 0 : $equipamentos[$i]['setor_id'] ?>','<?= 'alt' . $equipamentos[$i]['id'] ?>')">
                    <option selected value="0">Desalocado</option>
                    <?php foreach($setores as $setor) { ?>
                        <option value="<?= $setor['id'] ?>"><?= $setor['nome_setor'] ?></option>
                    <?php } ?>
                    </select>
                <?php } else { ?>
                    <select class="form-control select2" name="alt<?= $equipamentos[$i]['id'] ?>" id="alt<?= $equipamentos[$i]['id'] ?>" onchange="AtivaInativaBotaoAlocacao('btn<?= $equipamentos[$i]['id'] ?>','<?= $equipamentos[$i]['setor_id'] == '' ? 0 : $equipamentos[$i]['setor_id'] ?>','<?= 'alt' . $equipamentos[$i]['id'] ?>')">
                    <?php $alocado = false;
                    foreach($setores as $setor) {
                        if ($setor['id'] == $equipamentos[$i]['setor_id']) { ?>
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
                <?php } ?>
            </td>
            <td style="vertical-align: middle">
                <span><?= isset($data) ? $data : '' ?></span>
            </td>
        <?php } ?>
    <?php } ?>
    </tr>
    </tbody>
<?php } ?>