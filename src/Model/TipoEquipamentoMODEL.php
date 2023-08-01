<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\TIPO_EQUIPAMENTO_SQL;
use Src\VO\TipoEquipamentoVO;

class TipoEquipamentoMODEL extends Conexao
{
    public function CadastrarTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq)
    {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare(TIPO_EQUIPAMENTO_SQL::INSERIR_TIPO_EQUIPAMENTO());
        $sql->bindValue(1, $voTipoEq->getNomeTipoEquipamento());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultaTodosTipoEquipamentoMODEL()
    {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare(TIPO_EQUIPAMENTO_SQL::CONSULTAR_TODOS_TIPO_EQUIPAMENTO());

        try {
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq)
    {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare(TIPO_EQUIPAMENTO_SQL::ALTERAR_TIPO_EQUIPAMENTO());
        $sql->bindValue(1, $voTipoEq->getNomeTipoEquipamento());
        $sql->bindValue(2, $voTipoEq->getIdTipoEquipamento());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            return -1;
        }
    }

    public function ExcluiTipoEquipamentoMODEL(TipoEquipamentoVO $voTipoEq)
    {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare(TIPO_EQUIPAMENTO_SQL::EXCLUIR_TIPO_EQUIPAMENTO());
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