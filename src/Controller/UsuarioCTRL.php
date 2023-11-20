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
        // setando a senha criptografada
        $vo->setSenha(Util::CriptogravarSenha($vo->getCPF()));
        // setando as propriedades de grava erro
        $vo->setFuncaoErro(CADASTRAR_USUARIO);
        $vo->setCodLogado(Util::CodigoLogado());

        return $this->model->CadastrarUsuarioMODEL($vo);
    }

}