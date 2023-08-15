<?php

namespace Src\Model\SQL;

class EQUIPAMENTO_SQL
{
    public static function INSERIR_EQUIPAMENTO()
    {
        $sql = 'INSERT INTO tb_equipamento
                            (ident_equipamento, 
                            desc_equipamento, 
                            situacao, 
                            tipoequipamento_id, 
                            modelo_id)
                     VALUES (?, ?, ?, ?, ?)';

        return $sql;
    }

    public static function SELECIONAR_EQUIPAMENTO(string $comFiltro): string
    {
        if ($comFiltro == "N") {

            $sql = 'SELECT ident_equipamento, 
                           desc_equipamento, 
                           situacao, 
                           data_descarte, 
                           motivo_descarte, 
                           tipoequipamento_id, 
                           modelo_id 
                      FROM tb_equipamento
                  ORDER BY tipoequipamento_id';

        } else if($comFiltro == "C") {

            $sql = 'SELECT ident_equipamento, 
                           desc_equipamento, 
                           situacao, 
                           data_descarte, 
                           motivo_dSescarte, 
                           tipoequipamento_id, 
                           modelo_id 
                      FROM tb_equipamento
                     WHERE tipoequipamento_id = ?
                       AND modelo_id = ?
                       AND ident_equipamento = ?
                  ORDER BY tipoequipamento_id';

        } else if($comFiltro == "T") {

            $sql = 'SELECT ident_equipamento, 
                           desc_equipamento, 
                           ';

        } else { // comFiltro == "F" (usado na pesquisa da tela)

            $sql = 'SELECT ident_equipamento, 
                           desc_equipamento, 
                           situacao, 
                           data_descarte, 
                           motivo_descarte, 
                           tipoequipamento_id, 
                           modelo_id 
                      FROM tb_equipamento
                     WHERE ident_equipamento = ?
                       AND desc_equipamento = ?
                  ORDER BY tipoequipamento_id';

        }
        
        return $sql;
    }

    public static function ALTERAR_EQUIPAMENTO(): string
    {
        $sql = 'UPDATE tb_equipamento 
                   SET ident_equipamento = ?, 
                       desc_equipamento = ?, 
                       situacao = ?, 
                       data_descarte = ?, 
                       motivo_descarte = ?, 
                       tipoequipamento_id = ?, 
                       modelo_id = ? 
                 WHERE id = ?';
        
        return $sql;
    }

    public static function EXCLUIR_EQUIPAMENTO(): string
    {
        $sql = 'DELETE FROM tb_equipamento WHERE id = ?';

        return $sql;
    }
}
?>