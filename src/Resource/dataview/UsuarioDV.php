<?php
use Src\Controller\SetorCTRL;

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_Public\Util;
use Src\VO\UsuarioVO;
use Src\VO\TecnicoVO;
use Src\VO\FuncionarioVO;
use Src\Controller\UsuarioCTRL;

$ctrl = new UsuarioCTRL();

if (isset($_POST['verificar_email_duplicado'])) {

    echo $ctrl->VerificarEmailDuplicadoCTRL($_POST['email']);

} else if (isset($_POST['btn_cadastrar'])) {

    switch ($_POST['tipo']) {

        case USUARIO_ADM:
            $vo = new UsuarioVO;
            break;

        case USUARIO_TECNICO:
            $vo = new TecnicoVO;

            $vo->setNomeEmpresa($_POST['nome_empresa']);
            break;

        case USUARIO_FUNCIONARIO:
            $vo = new FuncionarioVO;

            $vo->setIdSetor($_POST['setor']);
            break;
    }

    // SETA AS PROPRIEDADES DO USUÁRIO
    $vo->setNome($_POST['nome']);
    $vo->setTipo($_POST['tipo']);
    $vo->setEmail($_POST['email']);
    $vo->setCPF($_POST['cpf']);
    $vo->setTelefone($_POST['telefone']);

    // SETA AS PROPRIEDADES DO ENDEREÇO
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setCep($_POST['cep']);
    $vo->setCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);

    $ret = $ctrl->CadastrarUsuarioCTRL($vo);
    echo $ret;

} else if (isset($_POST['btn_alterar'])) {

    switch ($_POST['tipo']) {

        case USUARIO_ADM:
            $vo = new UsuarioVO;
            break;

        case USUARIO_TECNICO:
            $vo = new TecnicoVO;
            $vo->setNomeEmpresa($_POST['nome_empresa']);
            break;

        case USUARIO_FUNCIONARIO:
            $vo = new FuncionarioVO;
            $vo->setIdSetor($_POST['setor']);
            break;
    }

    // dados do usuário
    $vo->setTipo($_POST['tipo_usuario']);
    $vo->setId($_POST['id_usuario']);
    $vo->setNome($_POST['nome']);
    $vo->setTelefone($_POST['telefone']);
    $vo->setEmail($_POST['email']);
    $vo->setCPF($_POST['cpf']);

    // dados do endereço
    $vo->setEnderecoId($_POST['id_endereco']);
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setCep($_POST['cep']);
    $vo->setCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);

    $ret = $ctrl->AlterarUsuarioCTRL($vo);
    echo $ret;

} else if (isset($_POST['filtrar_usuario'])) {

    $usuarios_encontrados = $ctrl->FiltrarUsuarioCTRL($_POST['nome_filtro']);

    if (count($usuarios_encontrados) == 0)
        echo 0;
    else {
        ?>
                    <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Situação</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php foreach ($usuarios_encontrados as $item) { ?>
                            <tr>
                                <td>
                                    <a href="alterar_usuario.php?cod=<?= $item['id'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                </td>
                                <td>
                                    <div
                                        class="custom-control custom-switch custom-switch-<?= $item['status_usuario'] == 0 ? 'off' : 'on' ?>-danger custom-switch-<?= $item['status_usuario'] == 0 ? 'on' : 'off' ?>-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch<?= $item['id'] ?>"
                                            onclick="AlterarStatusUsuario('<?= $item['id'] ?>','<?= $item['status_usuario'] ?>')">
                                        <label class="custom-control-label" for="customSwitch<?= $item['id'] ?>">
                                <?= Util::MostrarSituacao($item['status_usuario']) ?>
                                        </label>
                                    </div>
                                </td>
                                <td>
                        <?= $item['nome_usuario'] ?>
                                </td>
                                <td>
                        <?= Util::MostrarTipoUsuario($item['tipo_usuario']) ?>
                                </td>
                            </tr>
            <?php } ?>
                    </tbody>
    <?php } ?>

<?php } else if (isset($_POST['alterar_status_usuario'])) {

    $vo = new UsuarioVO();
    $vo->setId($_POST['id_user']);
    $vo->setStatus($_POST['status_user']);

    echo $ctrl->AlterarStatusCTRL($vo);

} else if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $dados = $ctrl->DetalharUsuarioCTRL($_GET['cod']);

    if (!is_array($dados) || empty($dados))
        Util::ChamarPagina('consultar_usuario');

    if ($dados['tipo_usuario'] == USUARIO_FUNCIONARIO)
        $setores = (new SetorCTRL)->ConsultarSetorCTRL();
}