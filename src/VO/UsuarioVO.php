<?php

namespace Src\VO;

use Src\_Public\Util;

class UsuarioVO
{

    private $id;
    private $nome;
    private $tipo;
    private $email;
    private $cpf;
    private $senha;
    private $status;
    private $telefone;
    private $endereco;

    //GET e SET id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    //GET e SET nome
    public function setNome(string $nome): void
    {
        $this->nome = Util::TratarDadosGeral($nome);
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    //GET e SET tipo
    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }
    public function getTipo(): int
    {
        return $this->tipo;
    }

    //GET e SET email
    public function setEmail(string $email): void
    {
        $this->email = Util::RemoverTags($email);
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    //GET e SET cpf
    public function setCPF(string $cpf): void
    {
        $this->email = Util::TirarCaracteresEspeciais($cpf);
    }
    public function getCPF(): string
    {
        return $this->cpf;
    }

    //GET e SET senha
    public function setSenha(string $senha): void
    {
        $this->senha = Util::RemoverTags($senha);
    }
    public function getSenha(): string
    {
        return $this->senha;
    }

    //GET e SET status
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
    public function getStatus(): int
    {
        return $this->status;
    }

    //GET e SET telefone
    public function setTelefone(string $telefone): void
    {
        $this->telefone = Util::TirarCaracteresEspeciais($telefone);
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    //GET e SET endereco
    public function setEndereco(string $endereco): void
    {
        $this->endereco = Util::RemoverTags($endereco);
    }
    public function getEndereco(): string
    {
        return $this->endereco;
    }
}

?>