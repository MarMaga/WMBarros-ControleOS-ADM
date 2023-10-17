<?php

namespace Src\Model\SQL;

class SETOR_SQL
{
    public static function INSERIR_SETOR()
    {
        $sql = 'INSERT INTO tb_setor
                            (nome_setor)
                     VALUES (?)';

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

    public static function CONSULTAR_SETORES_COM_EQUIPAMENTOS(): string
    {
        $sql = 'SELECT st.nome_setor,
                       al.setor_id,
                       (SELECT count(setor_id)
                          FROM tb_alocacao as al
						 WHERE st.id = al.setor_id
                           AND situacao = 1) as quantidade
                  FROM tb_setor as st
            INNER JOIN tb_alocacao as al
                    ON st.id = al.setor_id
                 WHERE st.id
                    IN (SELECT setor_id
                          FROM tb_alocacao
                         WHERE situacao = ?)
              GROUP BY al.setor_id
              ORDER BY st.nome_setor';

        return $sql;
    }

    public static function ALTERAR_SETOR(): string
    {
        $sql = 'UPDATE tb_setor 
                   SET nome_setor = ? 
                 WHERE id = ?';

        return $sql;
    }

    public static function EXCLUIR_SETOR(): string
    {
        $sql = 'DELETE
                  FROM tb_setor
                 WHERE id = ?';

        return $sql;
    }
}
?>