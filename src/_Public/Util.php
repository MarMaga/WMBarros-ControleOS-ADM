<?php

namespace Src\_Public;

class Util
{

    private static function SetarFusoHorario()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function DataAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d');
    }

    public static function DataAtualBr()
    {
        self::SetarFusoHorario();
        return date('d/m/Y');
    }

    public static function HoraAtual()
    {
        self::SetarFusoHorario();
        return date('H:i');
    }

    public static function DataHoraAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d H:i');
    }

    public static function TratarDadosGeral($palavra)
    {
        $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "“", "”", ' ', "~", "^", "_");
        $palavra = strip_tags($palavra);
        $palavra = str_replace($especiais, "", $palavra);
        return $palavra;
    }

    public static function RemoverTags($palavra)
    {
        $palavra = strip_tags($palavra);
        return $palavra;
    }

    public static function ChamarPagina($pag)
    {
        header("location: $pag.php");
        exit;
    }

    public function AjustaCasasDecimais($campo, $qtd)
    {
        # $campo: o campo a ser ajustado
        # $qtd: o número de casas decimais para ajustar em $campo
        # verifica se existe ponto decimal em $campo, mantém apenas os números e o ponto decimal, se $qtd > 0

        if (empty($campo))
            return '';

        $NegPos = "POSITIVO";
        if ($campo < 0) {
            $NegPos = "NEGATIVO";
        }
        # se tem só ponto(s)/vírgula(s), retorna ''
        $SoNum = str_replace(",", "", $campo);
        $SoNum = str_replace(".", "", $SoNum);
        if ($SoNum == 0)
            return '';

        $localPontoVirgula = 0;

        # encontra o local do primeiro ponto/vírgula a partir da direita
        # se não encontrar, EncontraPrimeiroPontoVirgula retornará zero
        $localPontoVirgula = self::EncontraPrimeiroPontoVirgula($campo);

        # só remove o último caracter se o tamanho de $campo for maior que 1
        # porque EncontraPrimeiroPontoVirgula retornará zero que, somado a 1, será igual ao tamanho de $campo
        if (strlen($campo) > 1) {

            # enquanto encontrar ponto/vírgula na última posição (mais à direita), remove
            while ($localPontoVirgula + 1 == strlen($campo)) {

                $campo = substr($campo, 0, strlen($campo) - 1);

                # encontra o local do primeiro ponto/vírgula a partir da direita do novo $campo
                $localPontoVirgula = self::EncontraPrimeiroPontoVirgula($campo);
                # se não encontrar ponto/vírgula, deve sair do While
                if ($localPontoVirgula == 0)
                    break;
            }
        }

        # se encontrou ponto/vírgula, tem ponto decimal
        if ($localPontoVirgula > 0) {
            # como substr considera o primeiro caracter como zero, adiciona 1 para tratar da posição real
            $localPontoVirgula++;
        }

        # define $esqDoCampo
        # se não tem ponto decimal, o que foi digitado deve ser incluído em $esqDoCampo
        if ($localPontoVirgula == 0) {
            $esqSoNum = $campo;

        } else { # se tem ponto decimal, deve lançar em $esqDoCampo apenas o que está à esquerda do ponto decimal
            $esqDoCampo = substr($campo, 0, $localPontoVirgula - 1);

            # remove qualquer outro ponto/vírgula de $esqDoCampo
            $esqSoNum = '';
            for ($i = 0; $i <= $localPontoVirgula - 1; $i++) {
                if (is_numeric(substr($esqDoCampo, $i, 1))) {
                    $esqSoNum = $esqSoNum . substr($esqDoCampo, $i, 1);
                }
            }
        }

        # se não tiver números em $esqSoNum (quando letras e símbolos são digitados sem números)
        # retorna ''
        $esqSoN = '';
        $temNum = false;
        for ($i = 0; $i < strlen($esqSoNum); $i++) {
            if (is_numeric(substr($esqSoNum, $i, 1))) {
                $esqSoN = $esqSoN . substr($esqSoNum, $i, 1);
                $temNum = true;
            }
        }
        if (!$temNum)
            return '';
        $esqSoNum = $esqSoN;

        # se não deve ter casas decimais
        if ($qtd == 0) {
            return $esqSoNum;
        } else { # se deve ter casas decimais

            # remove qualquer outro ponto e vírgula à direita do $localPontoVirgula
            $dirDoCampo = substr($campo, $localPontoVirgula, strlen($campo));
            $dirSoNum = '';
            for ($i = 0; $i <= $localPontoVirgula - 1; $i++) {
                if (is_numeric(substr($dirDoCampo, $i, 1))) {
                    $dirSoNum = $dirSoNum . substr($dirDoCampo, $i, 1);
                }
            }

            # se é para ter ponto decimal
            if ($qtd > 0) {
                # inclui o ponto decimal antes de inserir os zeros que faltam
                $esqSoNum = $esqSoNum . '.';
            }

            $qtdCasasDecimais = strlen($dirSoNum);

            if ($qtdCasasDecimais < $qtd) {
                for ($i = $qtdCasasDecimais; $i < $qtd; $i++) {
                    $dirSoNum = $dirSoNum . '0';
                }
            } elseif ($qtdCasasDecimais > $qtd) {
                $dirSoNum = substr($dirSoNum, 0, $qtd);
            }

            $campo = $esqSoNum . $dirSoNum;

            if ($NegPos == "NEGATIVO") {
                $campo = $campo * -1;
            }

            return $campo;
        }
    }

    function RemovePontoVirgula($campo)
    {
        $campo = str_replace(",", "", $campo);
        $campo = str_replace(".", "", $campo);
        return $campo;
    }

    function EncontraPrimeiroPontoVirgula($campo)
    {
        $localPontoVirgula = 0;
        for ($i = strlen(trim($campo)); $i >= 0; $i--) {
            if (substr($campo, $i, 1) == '.' || substr($campo, $i, 1) == ',') {
                $localPontoVirgula = $i;
                break;
            }
        }
        return $localPontoVirgula;
    }

    private static function IniciarSessao(){

        if(!isset($_SESSION)){
            session_start();
        }
    }

    public static function CriarSessao($cod, $nome){

        self::IniciarSessao();

        $_SESSION['cod'] = $cod;
        $_SESSION['nome'] = $nome;
    }

    public static function NomeLogado(){
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    public static function CodigoLogado(){
        self::IniciarSessao();
        //return $_SESSION['cod'];
        return '1';
    }

    public static function Deslogar(){

        self::IniciarSessao();
        unset($_SESSION['cod']);
        unset($_SESSION['nome']);

        self::ChamarPagina('login.php');
        exit;
    }

    public static function VerificarLogado(){

        self::IniciarSessao();

        if(!isset($_SESSION['cod']) || $_SESSION['cod'] == ''){
            
            self::ChamarPagina('login.php');
            exit;
        }
    }

    public static function MostrarSituacao(int $sit): string
    {
        $situacao = '';

        switch ($sit) {
            case SITUACAO_ATIVO:
                $situacao = 'ATIVO';
                break;
            
            case SITUACAO_INATIVO:
                $situacao = 'INATIVO';
                break;
        }

        return $situacao;
    }

    public static function MostrarDadosArray($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}

?>