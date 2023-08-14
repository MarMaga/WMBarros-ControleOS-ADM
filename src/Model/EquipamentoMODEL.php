<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\EQUIPAMENTO_SQL;
use Src\VO\EquipamentoVO;

class EquipamentoMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function CadastrarEquipamentoMODEL(EquipamentoVO $voEq): int
    {
        $sql = $this->conexao->prepare(EQUIPAMENTO_SQL::INSERIR_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++, $voEq->getIdentificacaoEquipamento());
        $sql->bindValue($i++, $voEq->getDescricaoEquipamento());
        $sql->bindValue($i++, 1);
        $sql->bindValue($i++, $voEq->getIdTipoEquipamento());
        $sql->bindValue($i++, $voEq->getIdModelo());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarEquipamentoMODEL(string $comFiltro): int|array
    {
        $sql = $this->conexao->prepare(EQUIPAMENTO_SQL::SELECIONAR_EQUIPAMENTO($comFiltro));

        try{
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex){
            return -1;
        }
    }

    public function FiltrarEquipamentoMODEL(EquipamentoVO $voEq, string $checarCadastro): int|array
    {
        if($checarCadastro == "F"){
            $sql = $this->conexao->prepare(EQUIPAMENTO_SQL::SELECIONAR_EQUIPAMENTO("F"));
            $i = 1;
            $sql->bindValue($i++, $voEq->getIdentificacaoEquipamento());
            $sql->bindValue($i++, $voEq->getDescricaoEquipamento());
        } else {
            $sql = $this->conexao->prepare(EQUIPAMENTO_SQL::SELECIONAR_EQUIPAMENTO("C"));
            $i = 1;
            $sql->bindValue($i++, $voEq->getIdTipoEquipamento());
            $sql->bindValue($i++, $voEq->getIdModelo());
            $sql->bindValue($i++, $voEq->getIdentificacaoEquipamento());
        }

        try{
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex){
            return -1;
        }
    }

    public function AlterarEquipamentoMODEL(EquipamentoVO $voEq): int
    {
        $sql = $this->conexao->prepare(EQUIPAMENTO_SQL::ALTERAR_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++, $voEq->getIdentificacaoEquipamento());
        $sql->bindValue($i++, $voEq->getDescricaoEquipamento());
        $sql->bindValue($i++, $voEq->getSituacao());
        $sql->bindValue($i++, $voEq->getDataDescarte());
        $sql->bindValue($i++, $voEq->getMotivoDescarte());
        $sql->bindValue($i++, $voEq->getIdTipoEquipamento());
        $sql->bindValue($i++, $voEq->getIdModelo());
        $sql->bindValue($i++, $voEq->getId());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            return -1;
        }      
    }

    public function ExcluirEquipamentoMODEL(EquipamentoVO $voEq): int
    {
        $sql = $this->conexao->prepare(EQUIPAMENTO_SQL::EXCLUIR_EQUIPAMENTO());
        $sql->bindValue(1, $voEq->getId());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            return -1;
        }
    }
}
?>