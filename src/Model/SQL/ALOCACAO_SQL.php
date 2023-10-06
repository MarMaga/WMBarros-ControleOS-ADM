<?php

namespace Src\Model\SQL;

class ALOCACAO_SQL
{
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

    public static function ALTERAR_ALOCACAO($alocarDesalocar): string
    {
        if ($alocarDesalocar == ALOCAR){

            $sql = 'UPDATE tb_alocacao 
                       SET setor_id = ?, 
                           situacao = ?, 
                           data_alocacao = ?
                     WHERE equipamento_id = ?';

        } else {

            $sql = 'UPDATE tb_alocacao 
                       SET setor_id = ?, 
                           situacao = ?, 
                           data_remocao = ?
                     WHERE equipamento_id = ?';
        }

        return $sql;
    }
}