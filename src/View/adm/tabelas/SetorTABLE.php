<thead>
    <tr>
        <th>Ação</th>
        <th>Setor</th>
    </tr>
</thead>
<tbody>
    <?php for ($i = 0; $i < count($setores); $i++) { ?>
        <tr>
            <td>
                <a href="#"
                    onclick="return ModalAlterarSetor('<?= $setores[$i]['id'] ?>', '<?= $setores[$i]['nome_setor'] ?>')"
                    class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterarSetor">Alterar</a>
                <a href="#"
                    onclick="return CarregarExcluir('<?= $setores[$i]['id'] ?>', '<?= $setores[$i]['nome_setor'] ?>')"
                    class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalExcluir">Excluir</a>
            </td>
            <td>
                <input type="hidden" name="id" id="id" value="<?= $setores[$i]['id'] ?>" />
                <?= $setores[$i]['nome_setor'] ?>
            </td>
        </tr>
    <?php } ?>
</tbody>