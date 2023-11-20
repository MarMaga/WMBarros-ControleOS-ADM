<?php

namespace Src\Model;

use Src\VO\LogErroVO;
use Src\_Public\MailSender;

// Configurações do Site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', "Marjmo20#2"); //senha
define('DB', 'db_controleos'); //banco

/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, Wladimir M. Barros
 */

class Conexao extends LogErroVO
{

    /** @var \PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null) {

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new \PDO($dsn, USER, PASS, null);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return self::$Connect;
    }

    public static function GravarErroLog($vo)
    {
        // cria a variável que guardará o nome do arquivo e seu caminho
        $arquivo = PATH . 'Model/LOGS/log_erro.txt';

        // verifica se NÂO EXISTE o arquivo
        // cria a mensagem a ser gravada no arquivo
        $msg = '-----------------------------------' . PHP_EOL;
        $msg .= 'Data do erro: ' . $vo->getDataErro() . PHP_EOL;
        $msg .= 'Hora do erro: ' . $vo->getHoraErro() . PHP_EOL;
        $msg .= 'Código do logado: ' . $vo->getCodLogado() . PHP_EOL;
        $msg .= 'Função do erro: ' . $vo->getFuncaoErro() . PHP_EOL;
        $msg .= 'Erro técnico: ' . $vo->getErroTecnico() . PHP_EOL;

        if (!file_exists($arquivo)) {
            // cria o arquivo pronto para escrita
            $arquivo = fopen($arquivo, 'w');
        } else { // se EXISTE o arquivo
            // abre o arquivo e coloca o cursor no final dele
            $arquivo = fopen($arquivo, 'a+');
        }

        // escreve a mensagem no arquivo
        fwrite($arquivo, $msg);
        // fecha o arquivo
        fclose($arquivo);

        // prepara a mensagem para enviar no e-mail
        $msg = '<!DOCTYPE html>
                <html lang="pt-BR">
                <head>
                <meta charset="UTF-8">
                </head>
                <body>';
        $msg .= '<span style="font-size: 200%">-----------------------------------</span><br>';
        $msg .= '<span style="font-size: 200%">Data do erro: ' . $vo->getDataErro() . '</span><br>';
        $msg .= '<span style="font-size: 200%">Hora do erro: ' . $vo->getHoraErro() . '</span><br>';
        $msg .= '<span style="font-size: 200%">Código do logado: ' . $vo->getCodLogado() . '</span><br>';
        $msg .= '<span style="font-size: 200%">Função do erro: ' . $vo->getFuncaoErro() . '</span><br>';
        $msg .= '<span style="font-size: 200%">Erro técnico: ' . $vo->getErroTecnico() . '</span><br>';
        $msg .= '<span style="font-size: 200%">-----------------------------------</span><br>
                </body>
                </html>';

        // cria o objeto para enviar o e-mail
        $email = new MailSender();

        // envia o e-mail
        // $email->EnviarEmail($msg);
    }

    public static function retornarConexao()
    {
        return self::Conectar();
    }
}