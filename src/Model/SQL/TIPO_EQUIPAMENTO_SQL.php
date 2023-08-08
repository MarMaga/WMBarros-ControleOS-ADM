<?php

namespace Src\Model\SQL;

class TIPO_EQUIPAMENTO_SQL
{
    public static function INSERIR_TIPO_EQUIPAMENTO(): string
    {
        $sql = 'INSERT INTO tb_tipoequipamento (tipo_equipamento) VALUES (?)';

        return $sql;
    }

    public static function SELECIONAR_TIPO_EQUIPAMENTO(string $comFiltro): string
    {
        if ($comFiltro == "N") 
        {
            $sql = 'SELECT id, 
                       tipo_equipamento 
                  FROM tb_tipoequipamento
              ORDER BY tipo_equipamento';

        } else {

            $sql = 'SELECT id, 
                           tipo_equipamento 
                      FROM tb_tipoequipamento 
                     WHERE tipo_equipamento LIKE ?
                  ORDER BY tipo_equipamento';
        }
        return $sql;
    }

    public static function ALTERAR_TIPO_EQUIPAMENTO(): string
    {
        $sql = 'UPDATE tb_tipoequipamento
                   SET tipo_equipamento = ?
                 WHERE id = ?';

        return $sql;
    }

    public static function EXCLUIR_TIPO_EQUIPAMENTO(): string
    {
        $sql = 'DELETE FROM tb_tipoequipamento WHERE id = ?';

        return $sql;
    }

}

?>