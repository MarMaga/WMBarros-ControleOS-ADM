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

    public static function DETALHAR_EQUIPAMENTO()
    {
        $sql = 'SELECT id,
                       ident_equipamento,
                       desc_equipamento,
                       situacao,
                       tipoequipamento_id, 
                       modelo_id
                  FROM tb_equipamento
                 WHERE id = ?';

        return $sql;
    }

    public static function FILTRAR_EQUIPAMENTO($idTipo, $idModelo)
    {
        // $sql = 'SELECT eq.id as equipamento_id,
        //                ident_equipamento,
        //                desc_equipamento,
        //                situacao,
        //                data_descarte,
        //                motivo_descarte,
        //                tipo_equipamento,
        //                nome_modelo,
        //                (SELECT count(*)
        //                   FROM tb_alocacao as al
        //                  WHERE al.equipamento_id = eq.id
        //                    AND al.situacao != ?) as esta_alocado
        //           FROM tb_equipamento as eq
        //     INNER JOIN tb_tipoequipamento as ti
        //             ON eq.tipoequipamento_id = ti.id
        //     INNER JOIN tb_modelo as mo
        //             ON eq.modelo_id = mo.id';

        $sql = 'SELECT eq.id as equipamento_id, 
                       ident_equipamento, 
                       eq.data_descarte, 
                       eq.motivo_descarte, 
                       eq.situacao as ativoInativo,
                       ti.tipo_equipamento,
                       mo.nome_modelo,
                       al.id as alocacao_id, 
                       al.data_alocacao, 
                       al.data_remocao, 
                       al.situacao as sit_alocacao, 
                       al.setor_id,
                       st.nome_setor
                  FROM tb_equipamento as eq
             LEFT JOIN tb_alocacao as al
                    ON eq.id = al.equipamento_id
            INNER JOIN tb_tipoequipamento as ti
                    ON eq.tipoequipamento_id = ti.id
            INNER JOIN tb_modelo as mo
                    ON eq.modelo_id = mo.id
             LEFT JOIN tb_setor as st
                    ON al.setor_id = st.id
                 WHERE (al.equipamento_id, al.id) 
                    IN (SELECT equipamento_id, 
                               MAX(id) 
                          FROM tb_alocacao 
                      GROUP BY equipamento_id)
                   AND eq.situacao != 0';

        if ($idTipo == '' && $idModelo == '') {
            $sql .= 'OR eq.id 
                        NOT IN 
                        (SELECT equipamento_id 
                           FROM tb_alocacao)
                     ORDER BY eq.ident_equipamento';
        } else if ($idTipo != '' && $idModelo != '') {
            $sql .= ' WHERE eq.tipoequipamento_id = ? AND eq.modelo_id = ?
                      ORDER BY eq.ident_equipamento';
        } else if ($idTipo == '' && $idModelo != '') {
            $sql .= ' WHERE eq.modelo_id = ?
                      ORDER BY eq.ident_equipamento';
        } else if ($idTipo != '' && $idModelo == '') {
            $sql .= ' WHERE eq.tipoequipamento_id = ?
                      ORDER BY eq.ident_equipamento';
        }

        return $sql;
    }

    public static function SELECIONAR_EQUIPAMENTO(string $comFiltro): string
    {
        if ($comFiltro == "N") { // N de Não: sem filtro; busca todos os registros

            $sql = 'SELECT ident_equipamento, 
                           desc_equipamento, 
                           situacao, 
                           data_descarte, 
                           motivo_descarte, 
                           tipoequipamento_id, 
                           modelo_id 
                      FROM tb_equipamento
                  ORDER BY tipoequipamento_id';

        } else if ($comFiltro == "C") { // C de Consulta: verifica a existência de um registro

            $sql = 'SELECT ident_equipamento, 
                           desc_equipamento, 
                           situacao, 
                           data_descarte, 
                           motivo_descarte, 
                           tipoequipamento_id, 
                           modelo_id 
                      FROM tb_equipamento
                     WHERE tipoequipamento_id = ?
                       AND modelo_id = ?
                       AND ident_equipamento = ?
                  ORDER BY tipoequipamento_id';

        } else if ($comFiltro == "T") { // T de Tabela: usado para preenchimento da tabela da tela

            $sql = 'SELECT eq.id, 
                           eq.ident_equipamento, 
                           eq.desc_equipamento, 
                           tipo.tipo_equipamento, 
                           modelo.nome_modelo 
                      FROM tb_equipamento eq
                INNER JOIN tb_tipoequipamento tipo
                        ON eq.tipoequipamento_id = tipo.id 
                INNER JOIN tb_modelo modelo
                        ON eq.modelo_id = modelo.id 
                  ORDER BY tipo.tipo_equipamento';

        } else { // comFiltro == "F" de Filtro; usado na pesquisa da tela (input Pesquisar por ...)

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
                       tipoequipamento_id = ?, 
                       modelo_id = ? 
                 WHERE id = ?';

        return $sql;
    }

    public static function EXCLUIR_EQUIPAMENTO(): string
    {
        $sql = 'DELETE
                  FROM tb_equipamento
                 WHERE id = ?';

        return $sql;
    }

    public static function ATIVAR_INATIVAR_EQUIPAMENTO(): string
    {
        $sql = 'UPDATE tb_equipamento
                   SET situacao = ?,
                       data_descarte = ?,
                       motivo_descarte = ?
                 WHERE id = ?';

        return $sql;
    }

    public static function LISTAR_EQUIPAMENTO_ALOCACAO(): string
    {
        $sql = 'SELECT eq.id as equipamentoID,
                       eq.ident_equipamento,
                       ti.tipo_equipamento,
                       mo.nome_modelo
                  FROM tb_equipamento as eq
            INNER JOIN tb_tipoequipamento as ti
                    ON eq.tipoequipamento_id = ti.id
            INNER JOIN tb_modelo as mo
                    ON eq.modelo_id = mo.id
                 WHERE eq.situacao = ?
                   AND eq.id 
                NOT IN (SELECT equipamento_id
                          FROM tb_alocacao
                         WHERE situacao != ?)';
                        
        return $sql;
    }

    public static function LISTAR_EQUIPAMENTO_ALOCACAO2($idTipo, $idModelo): string
    {
        $sql = 'SELECT eq.id, 
                       ident_equipamento,
                       desc_equipamento,
                       eq.situacao as ativo,
                       data_descarte,
                       motivo_descarte,
                       tipo_equipamento,
                       nome_modelo,
                       max(al.situacao) as situacao_alocacao,
                       max(al.data_alocacao) as data_alocacao,
                       max(al.data_remocao) as data_remocao,
                       max(al.setor_id) as setor_id,
                       max(st.nome_setor) as nome_setor
                  FROM tb_equipamento as eq 
             LEFT JOIN tb_alocacao as al ON eq.id = al.equipamento_id
             LEFT JOIN tb_setor as st ON al.setor_id = st.id
            INNER JOIN tb_tipoequipamento as ti
                    ON eq.tipoequipamento_id = ti.id
            INNER JOIN tb_modelo as mo
                    ON eq.modelo_id = mo.id
              GROUP BY eq.id';

        if ($idTipo != '' && $idModelo != '') {
            $sql .= ' WHERE eq.tipoequipamento_id = ? AND eq.modelo_id = ?';
        } else if ($idTipo == '' && $idModelo != '') {
            $sql .= ' WHERE eq.modelo_id = ?';
        } else if ($idTipo != '' && $idModelo == '') {
            $sql .= ' WHERE eq.tipoequipamento_id = ?';
        }

        return $sql;
    }

    public static function FILTRAR_EQUIPAMENTOS_POR_SETOR(): string
    {
        $sql = 'SELECT eq.id as equipamentoID,
                       eq.ident_equipamento,
                       ti.tipo_equipamento,
                       mo.nome_modelo,
                       al.id as alocacaoID,
                       al.data_alocacao,
                       st.nome_setor
                  FROM tb_equipamento as eq
            INNER JOIN tb_tipoequipamento as ti
                    ON eq.tipoequipamento_id = ti.id
            INNER JOIN tb_modelo as mo
                    ON eq.modelo_id = mo.id
            INNER JOIN tb_alocacao as al
                    ON eq.id = al.equipamento_id
            INNER JOIN tb_setor as st
                    ON al.setor_id = st.id
                 WHERE al.setor_id = ?
                   AND al.situacao = ?
                   AND data_remocao is null';

        return $sql;
    }

    public static function INSERIR_ALOCACAO(): string
    {
        $sql = 'INSERT INTO tb_alocacao
                            (equipamento_id, 
                            setor_id,
                            situacao, 
                            data_alocacao)
                     VALUES (?, ?, ?, ?)';

        return $sql;
    }

    public static function DESALOCAR_EQUIPAMENTO(): string
    {
        $sql = 'UPDATE tb_alocacao 
                   SET situacao = ?,
                       data_remocao = ?
                 WHERE id = ?';

        return $sql;
    }
}
?>