<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\MODELO_EQUIPAMENTO_SQL;
use Src\VO\ModeloVO;

class ModeloEquipamentoMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function CadastrarModeloEquipamentoMODEL(ModeloVO $voModelo): int
    {
        $sql = $this->conexao->prepare(MODELO_EQUIPAMENTO_SQL::INSERIR_MODELO_EQUIPAMENTO());
        $sql->bindValue(1, $voModelo->getNomeModelo());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarModeloEquipamentoMODEL(): int|array
    {
        $sql = $this->conexao->prepare(MODELO_EQUIPAMENTO_SQL::SELECIONAR_MODELO_EQUIPAMENTO("N"));

        try{
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function FiltrarModeloEquipamentoMODEL(ModeloVO $voModelo, $checarCadastro): int|array
    {
        if($checarCadastro == "F"){
            $sql = $this->conexao->prepare(MODELO_EQUIPAMENTO_SQL::SELECIONAR_MODELO_EQUIPAMENTO("F"));
            $sql->bindValue(1, '%' . $voModelo->getNomeModelo() . '%');
        } else {
            $sql = $this->conexao->prepare(MODELO_EQUIPAMENTO_SQL::SELECIONAR_MODELO_EQUIPAMENTO("S"));
            $sql->bindValue(1, $voModelo->getNomeModelo());
        }

        try{
            $sql->setFetchMode(\PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarModeloEquipamentoMODEL(ModeloVO $voModelo): int
    {
        $sql = $this->conexao->prepare(MODELO_EQUIPAMENTO_SQL::ALTERAR_MODELO_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++, $voModelo->getNomeModelo());
        $sql->bindValue($i++, $voModelo->getIdModelo());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            return -1;
        }
    }

    public function ExcluirModeloEquipamentoMODEL(ModeloVO $voModelo): int
    {
        $sql = $this->conexao->prepare(MODELO_EQUIPAMENTO_SQL::EXCLUIR_MODELO_EQUIPAMENTO());
        $sql->bindValue(1, $voModelo->getIdModelo());

        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            return -1;
        }
    }
}
?>