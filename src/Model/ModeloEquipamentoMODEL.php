<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\MODELO_EQUIPAMENTO_SQL;
use Src\VO\ModeloVO;

class ModeloEquipamentoMODEL extends Conexao
{

    public static function CadastrarModeloEquipamentoMODEL(ModeloVO $voModelo)
    {
        $conexao = parent::retornarConexao();
        $sql = $conexao->prepare(MODELO_EQUIPAMENTO_SQL::INSERIR_MODELO_EQUIPAMENTO());
        $sql->bindValue(1, $voModelo->getNomeModelo());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public static function ConsultarModeloEquipamentoMODEL(ModeloVO $voModelo)
    {

    }
}

?>