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
                   SET status_usuario = ? 
                 WHERE id = ?';

        return $sql;
    }

    public static function DETALHAR_USUARIO(): string
    {
        $sql = 'SELECT usu.nome_usuario,
                       usu.tipo_usuario,
                       usu.email_usuario,
                       usu.cpf_usuario,
                       usu.senha_usuario,
                       usu.status_usuario,
                       usu.tel_usuario,
                       en.rua,
                       en.bairro,
                       en.cep,
                       en.id as id_endereco,
                       en.id_cidade,
                       cid.nome_cidade,
                       est.sigla_estado,
                       tec.nome_empresa,
                       fun.id_setor
                  FROM tb_usuario as usu
             LEFT JOIN tb_funcionario as fun
                    ON usu.id = fun.id_usuario
             LEFT JOIN tb_tecnico as tec
                    ON usu.id = tec.id_usuario
            INNER JOIN tb_endereco as en
                    ON usu.id = en.id_usuario
            INNER JOIN tb_cidade as cid
                    ON en.id_cidade = cid.id
            INNER JOIN tb_estado as est
                    ON cid.id_estado = est.id
                 WHERE usu.id = ?';

        return $sql;
    }

    public static function ALTERAR_USUARIO_TECNICO(): string
    {
        $sql = 'UPDATE tb_tecnico
                   SET nome_empresa = ?
                 WHERE id = ?';

        return $sql;
    }

    public static function ALTERAR_USUARIO_FUNCIONARIO(): string
    {
        $sql = 'UPDATE tb_funcionario
                   SET setor_id = ?
                 WHERE id = ?';

        return $sql;
    }


}