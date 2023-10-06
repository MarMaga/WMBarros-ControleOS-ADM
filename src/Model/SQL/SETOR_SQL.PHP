<?php

namespace Src\Model\SQL;

class SETOR_SQL
{
    public static function INSERIR_SETOR()
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

    public static function FILTRAR_SETOR($idTipo, $idModelo)
    {
        $sql = 'SELECT eq.id as equipamento_id,
                       ident_equipamento,
                       desc_equipamento,
                       situacao,
                       data_descarte,
                       motivo_descarte,
                       tipo_equipamento,
                       nome_modelo,
                       (SELECT count(*)
                          FROM tb_alocacao as al
                         WHERE al.equipamento_id = eq.id
                           AND al.situacao != ?) as esta_alocado
                  FROM tb_equipamento as eq
            INNER JOIN tb_tipoequipamento as ti
                    ON eq.tipoequipamento_id = ti.id
            INNER JOIN tb_modelo as mo
                    ON eq.modelo_id = mo.id';

        if ($idTipo != '' && $idModelo != '') {
            $sql .= ' WHERE eq.tipoequipamento_id = ? AND eq.modelo_id = ?';
        } else if ($idTipo == '' && $idModelo != '') {
            $sql .= ' WHERE eq.modelo_id = ?';
        } else if ($idTipo != '' && $idModelo == '') {
            $sql .= ' WHERE eq.tipoequipamento_id = ?';
        }

        return $sql;
    }

    public static function CONSULTAR_SETOR(string $comFiltro): string
    {
        if ($comFiltro == "N") {

            $sql = 'SELECT id, 
                       nome_setor 
                  FROM tb_setor
              ORDER BY nome_setor';

        } else {

            $sql = 'SELECT id, 
                           nome_setor 
                      FROM tb_setor 
                     WHERE nome_setor LIKE ?
                  ORDER BY nome_setor';
        }

        return $sql;
    }

    public static function ALTERAR_SETOR(): string
    {
        $sql = 'UPDATE tb_equipamento 
                   SET ident_equipamento = ?, 
                       desc_equipamento = ?, 
                       tipoequipamento_id = ?, 
                       modelo_id = ? 
                 WHERE id = ?';

        return $sql;
    }

    public static function EXCLUIR_SETOR(): string
    {
        $sql = 'DELETE
                  FROM tb_equipamento
                 WHERE id = ?';

        return $sql;
    }
}
?>