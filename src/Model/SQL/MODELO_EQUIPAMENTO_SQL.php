<?php

namespace Src\Model\SQL;

class MODELO_EQUIPAMENTO_SQL
{
    public static function INSERIR_MODELO_EQUIPAMENTO()
    {

        $sql = 'INSERT INTO tb_modelo (nome_modelo) VALUES (?)';

        return $sql;
    }

    public static function SELECIONAR_MODELO_EQUIPAMENTO(string $comFiltro): string
    {

        if ($comFiltro == "N") {

            $sql = 'SELECT id, 
                           nome_modelo 
                      FROM tb_modelo 
                  ORDER BY nome_modelo';

        } else {

            $sql = 'SELECT id, 
                           nome_modelo 
                      FROM tb_modelo 
                     WHERE nome_modelo LIKE ? 
                  ORDER BY nome_modelo';

        }

        return $sql;
    }

    public static function ALTERAR_MODELO_EQUIPAMENTO(): string
    {

        $sql = 'UPDATE tb_modelo 
                   SET nome_modelo = ? 
                 WHERE id = ?';

        return $sql;
    }

    public static function EXCLUIR_MODELO_EQUIPAMENTO(): string
    {

        $sql = 'DELETE FROM tb_modelo WHERE id = ?';

        return $sql;
    }
}
?>