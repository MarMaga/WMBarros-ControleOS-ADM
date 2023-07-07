<?php

namespace Src\VO;

use Src\_Public\Util;

class UsuarioVO
{

    private $id;
    private $nome;
    private $tipo;
    private $email;
    private $senha;
    private $telefone;
    private $status;

    //GET e SET id
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    //GET e SET nome
    public function setNome($nome): void
    {
        $this->nome = Util::TratarDadosGeral($nome);
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    //GET e SET tipo
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }
    public function getTipo(): int
    {
        return $this->tipo;
    }

    //GET e SET email
    public function setEmail($email): void
    {
        $this->email = Util::RemoverTags($email);
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    //GET e SET senha
    public function setSenha($senha): void
    {
        $this->senha = Util::RemoverTags($senha);
    }
    public function getSenha(): string
    {
        return $this->senha;
    }

    //GET e SET telefone
    public function setTelefone($telefone): void
    {
        $this->telefone = Util::TirarCaracteresEspeciais($telefone);
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    //GET e SET status
    public function setStatus($status): void
    {
        $this->status = $status;
    }
    public function getStatus(): int
    {
        return $this->status;
    }
}

?>