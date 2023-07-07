<?php

namespace Src\VO;

use Src\VO\UsuarioVO;

class FuncionarioVO extends UsuarioVO
{

    private $id_setor;

    public function setIdSetor($id): void
    {
        $this->id_setor = $id;
    }
    public function getIdSetor(): int
    {
        return $this->id_setor;
    }
}
?>