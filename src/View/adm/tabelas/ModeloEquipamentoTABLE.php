<thead>
    <tr>
        <th>Ação</th>
        <th>Modelo de equipamento</th>
    </tr>
</thead>
<tbody>
    <?php for ($i = 0; $i < count($modelos); $i++) { ?>
        <tr>
            <td>
                <a href="#"
                    onclick="return ModalAlterarModeloEquipamento('<?= $modelos[$i]['id'] ?>', '<?= $modelos[$i]['nome_modelo'] ?>')"
                    class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterarModelo">Alterar</a>
                <a href="#"
                    onclick="return CarregarExcluir('<?= $modelos[$i]['id'] ?>', '<?= $modelos[$i]['nome_modelo'] ?>')"
                    class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalExcluir">Excluir</a>
            </td>
            <td>
                <input type="hidden" name="id" id="id" value="<?= $modelos[$i]['id'] ?>" />
                <?= $modelos[$i]['nome_modelo'] ?>
            </td>
        </tr>
    <?php } ?>
</tbody>