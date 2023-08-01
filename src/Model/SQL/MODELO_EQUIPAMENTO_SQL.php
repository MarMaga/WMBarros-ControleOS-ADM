<?php

namespace Src\Model\SQL;

class MODELO_EQUIPAMENTO_SQL
{
    public static function INSERIR_MODELO_EQUIPAMENTO(){

        $sql = 'INSERT INTO tb_modelo (nome_modelo) VALUES (?)';

        return $sql;
    }
}

?>