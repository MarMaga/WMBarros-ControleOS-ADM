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
        $sql = 'SELECT eq.id as equipamento_id,
                       ident_equipamento,
                       desc_equipamento,
                       situacao,
                       data_descarte,
                       motivo_descarte,
                       tipo_equipamento,
                       nome_modelo
                  FROM tb_equipamento as eq
            INNER JOIN tb_tipoequipamento as ti
                    ON eq.tipoequipamento_id = ti.id
            INNER JOIN tb_modelo as mo
                    ON eq.modelo_id = mo.id';

        if ($idTipo != '' && $idModelo != ''){
            $sql .= ' WHERE eq.tipoequipamento_id = ? AND eq.modelo_id = ?';
        } else if ($idTipo == '' && $idModelo != ''){
            $sql .= ' WHERE eq.modelo_id = ?';
        } else if ($idTipo != '' && $idModelo == ''){
            $sql .= ' WHERE eq.tipoequipamento_id = ?';
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

        } else if($comFiltro == "C") { // C de Consulta: verifica a existência de um registro

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

        } else if($comFiltro == "T") { // T de Tabela: usado para preenchimento da tabela da tela

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
}
?>