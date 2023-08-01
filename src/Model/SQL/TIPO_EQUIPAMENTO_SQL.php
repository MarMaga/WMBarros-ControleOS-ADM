<?php

namespace Src\Model\SQL;

class TIPO_EQUIPAMENTO_SQL
{
    public static function INSERIR_TIPO_EQUIPAMENTO()
    {

        $sql = 'INSERT INTO tb_tipoequipamento (tipo_equipamento) VALUES (?)';

        return $sql;

    }

    public static function CONSULTAR_TODOS_TIPO_EQUIPAMENTO()
    {
        $sql = 'SELECT * FROM tb_tipoequipamento';

        return $sql;
    }

    public static function ALTERAR_TIPO_EQUIPAMENTO()
    {
        $sql = 'UPDATE tb_tipoequipamento SET tipo_equipamento = ? WHERE id = ?';

        return $sql;
    }

    public static function EXCLUIR_TIPO_EQUIPAMENTO()
    {
        $sql = 'DELETE FROM tb_tipoequipamento WHERE id = ?';

        return $sql;
    }

}

?>