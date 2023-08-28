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