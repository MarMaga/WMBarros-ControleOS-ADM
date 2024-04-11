<?php

namespace Src\Controller;

use Src\_Public\Util;
use Src\VO\UsuarioVO;
use Src\Model\UsuarioMODEL;

class UsuarioCTRL
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuarioModel();
    }

    public function VerificarEmailDuplicadoCTRL(string $email): bool
    {
        return $this->model->VerificarEmailDuplicadoMODEL($email);
    }

    public function CadastrarUsuarioCTRL($vo): int
    {
        // VALIDA AS PROPRIEDADES COMUNS ENTRE TODOS OS TIPOS DE USUÁRIO

        if (
            empty($vo->getNome()) || empty($vo->getTipo()) || empty($vo->getEmail()) ||
            empty($vo->getCPF()) || empty($vo->getTelefone()) || empty($vo->getRua()) ||
            empty($vo->getBairro()) || empty($vo->getCep()) || empty($vo->getCidade()) ||
            empty($vo->getEstado())
        )
            return 0;
        
        // VALIDA AS PROPRIEDADES ESPECÍFICAS DOS USUÁRIOS

        if ($vo->getTipo() == USUARIO_TECNICO && empty($vo->getNomeEmpresa()))
            return 0;

        if ($vo->getTipo() == USUARIO_FUNCIONARIO && empty($vo->getIdSetor()))
            return 0;
        
        // setar o status
        $vo->setStatus(SITUACAO_ATIVO);
        // setando a senha criptografada (criptografia e remoção de tags acontece na VO)
        $vo->setSenha($vo->getCPF());
        // setando as propriedades de grava erro
        $vo->setFuncaoErro(CADASTRAR_USUARIO);
        $vo->setCodLogado(Util::CodigoLogado());

        return $this->model->CadastrarUsuarioMODEL($vo);
    }

    public function AlterarUsuarioCTRL($vo): int
    {
        // VALIDA AS PROPRIEDADES COMUNS ENTRE TODOS OS TIPOS DE USUÁRIO

        if (empty($vo->getNome()) || empty($vo->getEmail()) ||
            empty($vo->getCPF()) || empty($vo->getTelefone()) || 
            empty($vo->getRua()) || empty($vo->getBairro()) ||
            empty($vo->getCep()) || empty($vo->getCidade()) ||
            empty($vo->getEstado())
        )
            return 0;

        // VALIDA AS PROPRIEDADES ESPECÍFICAS DOS USUÁRIOS
        // NÃO PRECISA VALIDAR O SETOR PORQUE ELE SEMPRE ESTÁ PRESENTE (NÃO EXISTE A OPTION 'SELECIONAR')
        if ($vo->getTipo() == USUARIO_TECNICO && empty($vo->getNomeEmpresa()))
            return 0;

        // setando as propriedades de grava erro
        $vo->setFuncaoErro(ALTERAR_USUARIO);
        $vo->setCodLogado(Util::CodigoLogado());

        return $this->model->CadastrarUsuarioMODEL($vo);
    }

    public function FiltrarUsuarioCTRL(string $nome): array
    {
        return $this->model->FiltrarUsuarioMODEL($nome);
    }

    public function AlterarStatusCTRL(UsuarioVO $vo): int
    {
        $vo->setFuncaoErro(ALTERAR_STATUS_USUARIO);
        $vo->setStatus($vo->getStatus() == SITUACAO_ATIVO ? SITUACAO_INATIVO : SITUACAO_ATIVO);
        return $this->model->AlterarStatusMODEL($vo);
    }

    public function DetalharUsuarioCTRL(int $id): array|int
    {
        if($id == '' || $id <= 0)
            return 0;

        return $this->model->DetalharUsuarioMODEL($id);
    }

    public function ValidarLoginCTRL(string $login, string $senha): int | array
    {
        if (empty($login) || empty($senha))
            return 0;

        $usuario = $this->model->ValidarLoginMODEL($login, SITUACAO_ATIVO);

        // não encontrou CPF de usuário ativado
        // Mensagem: Login inválido
        if (empty($usuario))
            return -10;

        // senha inválida
        // Mensagem: Login inválido
        if(Util::VerificarSenha($senha, $usuario['senha_usuario']))
            return -10;

        Util::CriarSessao($usuario['id'], $usuario['nome_usuario']);
        // Util::ChamarPagina(PATH . 'view/adm/inicial_adm');

        // mensagem "Você conectou-se, $_SESSION['nome_usuario']"
        return 3;
    }
}