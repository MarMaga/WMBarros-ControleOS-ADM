<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\SETOR_SQL;
use Src\VO\SetorVO;

class SetorMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }
    
    public function CadastrarSetorMODEL(SetorVO $voSetor): int
    {
        $sql = $this->conexao->prepare(SETOR_SQL::INSERIR_SETOR());
        $sql->bindValue(1, $voSetor->getNome());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $voSetor->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($voSetor);
            return -1;
        }
    }

    public function ConsultarSetorMODEL(): int|array
    {
        $sql = $this->conexao->prepare(SETOR_SQL::CONSULTAR_SETOR("N"));

        try {
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarSetoresComEquipamentosMODEL(): int|array
    {
        $sql = $this->conexao->prepare(SETOR_SQL::CONSULTAR_SETORES_COM_EQUIPAMENTOS());

        $sql->bindValue(1, SITUACAO_EQUIPAMENTO_ALOCADO);

        try {
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function FiltrarSetorMODEL(SetorVO $voSetor, string $checarCadastro): int|array
    {
        if ($checarCadastro == "F") {
            $sql = $this->conexao->prepare(SETOR_SQL::CONSULTAR_SETOR("F"));
            $sql->bindValue(1, '%' . $voSetor->getNome() . '%');
        } else {
            $sql = $this->conexao->prepare(SETOR_SQL::CONSULTAR_SETOR("S"));
            $sql->bindValue(1, $voSetor->getNome());
        }

        try {
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarSetorMODEL(SetorVO $voSetor): int
    {
        $sql = $this->conexao->prepare(SETOR_SQL::ALTERAR_SETOR());
        $i = 1;
        $sql->bindValue($i++, $voSetor->getNome());
        $sql->bindValue($i++, $voSetor->getId());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $voSetor->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($voSetor);
            return -1;
        }
    }

    public function ExcluiSetorMODEL(SetorVO $voSetor): int
    {
        $sql = $this->conexao->prepare(SETOR_SQL::EXCLUIR_SETOR());
        $sql->bindValue(1, $voSetor->getId());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $voSetor->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($voSetor);
            return -1;
        }
    }
}

?>