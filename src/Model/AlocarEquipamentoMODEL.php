<?php

namespace Src\Model;

use Exception;
use Src\_Public\Util;
use Src\Model\Conexao;
use Src\Model\SQL\ALOCACAO_SQL;
use Src\VO\AlocarVO;

class AlocarEquipamentoMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function InserirAlocacaoMODEL(AlocarVO $voAloc): int
    {
        $sql = $this->conexao->prepare(ALOCACAO_SQL::INSERIR_ALOCACAO());

        $i = 1;
        $sql->bindValue($i++, $voAloc->getIdEquipamento());
        $sql->bindValue($i++, $voAloc->getIdSetor());
        $sql->bindValue($i++, $voAloc->getSituacao());
        $sql->bindValue($i++, $voAloc->getDataAlocacao());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarAlocacaoMODEL(AlocarVO $voAloc, string $lancaDataAlocacaoRemocao): int
    {
        if ($lancaDataAlocacaoRemocao == 'A') {
            $sql = $this->conexao->prepare(ALOCACAO_SQL::ALTERAR_ALOCACAO(ALOCAR));
        } else {
            $sql = $this->conexao->prepare(ALOCACAO_SQL::ALTERAR_ALOCACAO(DESALOCAR));
        }

        $i = 1;
        $sql->bindValue($i++, $voAloc->getIdSetor());
        $sql->bindValue($i++, $voAloc->getSituacao());
        if ($lancaDataAlocacaoRemocao == 'A') {
            $sql->bindValue($i++, $voAloc->getDataAlocacao());
        } else {
            $sql->bindValue($i++, $voAloc->getDataRemocao());
        }
        $sql->bindValue($i++, $voAloc->getIdEquipamento());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
}