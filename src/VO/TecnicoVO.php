<?php

namespace Src\VO;

use Src\_Public\Util;
use Src\VO\UsuarioVO;

class TecnicoVO extends UsuarioVO
{

    private $nome_empresa;

    public function setNomeEmpresa(string $nome): void
    {
        $this->nome_empresa = Util::RemoverTags($nome);
    }
    public function getNomeEmpresa(): string
    {
        return $this->nome_empresa;
    }

}

?>