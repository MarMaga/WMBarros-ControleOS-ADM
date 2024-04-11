<?php

namespace Src\VO;

use Src\_Public\Util;
use Src\VO\EnderecoVO;

class UsuarioVO extends EnderecoVO
{

    private $id;
    private $tipo;
    private $setor;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $senha;
    private $novaSenha;
    private $novaSenhaRepetida;
    private $status;

    //GET e SET id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
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

    //GET e SET setor
    public function setSetor(int $setor): void
    {
        $this->setor = $setor;
    }
    public function getSetor(): int
    {
        return $this->setor;
    }

    //GET e SET nome
    public function setNome(string $nome): void
    {
        $this->nome = Util::TirarCaracteresEspeciais($nome);
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    //GET e SET cpf
    public function setCPF(string $cpf): void
    {
        $this->cpf = Util::TratarDadosGeral($cpf);
    }
    public function getCPF(): string
    {
        return $this->cpf;
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

    //GET e SET telefone
    public function setTelefone(string $telefone): void
    {
        $this->telefone = Util::TratarDadosGeral($telefone);
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

    //GET e SET senha
    public function setSenha(string $senha): void
    {
        // já remove as tags (RemoverTags()) quando o CPF é incluído na VO (setCPF()) que contém TratarDadosGeral()
        $this->senha = Util::CriptografarSenha($senha);
    }
    public function getSenha(): string
    {
        return $this->senha;
    }

    //GET e SET novaSenha
    public function setNovaSenha(string $novaSenha): void
    {
        $this->novaSenha = $novaSenha;
    }
    public function getNovaSenha(): string
    {
        return $this->novaSenha;
    }
  
    //GET e SET status
    public function setNovaSenhaRepetida(string $novaSenhaRepetida): void
    {
        $this->novaSenhaRepetida = $novaSenhaRepetida;
    }
    public function getNovaSenhaRepetida(): string
    {
        return $this->novaSenhaRepetida;
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
}

?>