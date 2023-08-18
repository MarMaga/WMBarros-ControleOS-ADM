<?php

namespace Src\VO;

use Src\VO\LogErroVO;

class SetorVO extends LogErroVO
{
    private $id;
    private $nome;

    // SET e GET id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // SET e GET nome
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function getNome(): string
    {
        return $this->nome;
    }

}

?>