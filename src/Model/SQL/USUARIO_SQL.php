<?php

namespace Src\Model\SQL;

class USUARIO_SQL
{
    public static function VERIFICAR_EMAIL(): string
    {
        $sql = 'SELECT count(email_usuario) as contar_email
                  FROM tb_usuario
                 WHERE email_usuario = ?';
        return $sql;
    }

    public static function CADASTRAR_ESTADO(): string
    {
        $sql = 'INSERT INTO tb_estado (sigla_estado)
                     VALUES (?)';
        return $sql;
    }

    public static function CADASTRAR_CIDADE(): string
    {
        $sql = 'INSERT INTO tb_cidade(nome_cidade, id_estado)
                     VALUES (?,?)';
        return $sql;
    }

    public static function CADASTRAR_ENDERECO(): string
    {
        $sql = 'INSERT INTO tb_endereco(rua, bairro, cep, id_usuario, id_cidade)
                     VALUES (?,?,?,?,?)';
        return $sql;
    }

    public static function CADASTRAR_USUARIO(): string
    {
        $sql = 'INSERT INTO tb_usuario (nome_usuario, tipo_usuario, email_usuario, cpf_usuario, senha_usuario, status_usuario, tel_usuario)
                     VALUES (?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function CADASTRAR_USUARIO_TECNICO(): string
    {
        $sql = 'INSERT INTO tb_tecnico(id_usuario, nome_empresa)
                     VALUES (?,?)';
        return $sql;
    }

    public static function CADASTRAR_USUARIO_FUNCIONARIO(): string
    {
        $sql = 'INSERT INTO tb_funcionario(id_usuario, id_setor)
                     VALUES (?,?)';
        return $sql;
    }

    public static function VERIFICAR_CIDADE_CADASTRADA(): string
    {
        $sql = 'SELECT ci.id as id_cidade
                  FROM tb_cidade as ci
            INNER JOIN tb_estado as es
                    ON ci.id_estado = es.id
                 WHERE ci.nome_cidade = ?
                   AND es.sigla_estado = ?';
        return $sql;
    }

    public static function VERIFICAR_ESTADO_CADASTRADO(): string
    {
        $sql = 'SELECT id
                  FROM tb_estado
                 WHERE sigla_estado = ?';
        return $sql;
    }

    public static function FILTRAR_USUARIO(): string
    {
        $sql = 'SELECT id, nome_usuario, tipo_usuario, status_usuario
                  FROM tb_usuario
                 WHERE nome_usuario LIKE ?';
        
        return $sql;
    }

    public static function ALTERAR_STATUS(): string
    {
        $sql = 'UPDATE tb_usuario 
                   SET situacao_usuario = ? 
                 WHERE id = ?';

        return $sql;
    }
}