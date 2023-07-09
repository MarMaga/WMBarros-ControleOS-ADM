<?php

namespace Src\VO;

use Src\_Public\Util;

class ModeloVO
{
    private $id;
    private $nome_modelo;

    // SET e GET id_modelo
    public function setIdModelo($id): void
    {
        $this->id = $id;
    }
    public function getIdModelo(): int
    {
        return $this->id;
    }
    
    // SET e GET motivo_descarte
    public function setNomeModelo($nome_modelo): void
    {
        $this->nome_modelo = Util::RemoverTags($nome_modelo);
    }
    public function getNomeModelo(): string
    {
        return $this->nome_modelo;
    }

}

?>