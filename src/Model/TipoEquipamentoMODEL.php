<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\TIPO_EQUIPAMENTO_SQL;
use Src\VO\TipoEquipamentoVO;

class TipoEquipamentoMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }
    public function CadastrarTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq): int
    {
        $sql = $this->conexao->prepare(TIPO_EQUIPAMENTO_SQL::INSERIR_TIPO_EQUIPAMENTO());
        $sql->bindValue(1, $voTipoEq->getNomeTipoEquipamento());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarTipoEquipamentoMODEL(): int|array
    {
        $sql = $this->conexao->prepare(TIPO_EQUIPAMENTO_SQL::SELECIONAR_TIPO_EQUIPAMENTO("N"));

        try {
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function FiltrarTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq): int|array
    {
        $sql = $this->conexao->prepare(TIPO_EQUIPAMENTO_SQL::SELECIONAR_TIPO_EQUIPAMENTO("S"));
        $sql->bindValue(1, '%' . $voTipoEq->getNomeTipoEquipamento() . '%');

        try {
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq): int
    {
        $sql = $this->conexao->prepare(TIPO_EQUIPAMENTO_SQL::ALTERAR_TIPO_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++, $voTipoEq->getNomeTipoEquipamento());
        $sql->bindValue($i++, $voTipoEq->getIdTipoEquipamento());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ExcluiTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq): int
    {
        $sql = $this->conexao->prepare(TIPO_EQUIPAMENTO_SQL::EXCLUIR_TIPO_EQUIPAMENTO());
        $sql->bindValue(1, $voTipoEq->getIdTipoEquipamento());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
}

?>