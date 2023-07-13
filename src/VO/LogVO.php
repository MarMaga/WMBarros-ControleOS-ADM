<?php

namespace Src\VO;

use Src\_Public\Util;

class LogVO
{
    private $id;
    private $data;
    private $id_usuario;

    // SET e GET id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // GET data
    public function getData(): string
    {
        return Util::DataAtual();
    }

    // SET e GET id_usuario
    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }
    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }
}

?>