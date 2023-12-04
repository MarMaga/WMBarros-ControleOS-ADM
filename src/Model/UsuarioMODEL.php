<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\VO\UsuarioVO;
use Src\Model\SQL\USUARIO_SQL;
use Src\VO\EnderecoVO;
use Src\VO\TecnicoVO;
use Src\VO\FuncionarioVO;

class UsuarioMODEL extends Conexao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function VerificarEmailDuplicadoMODEL(string $email): bool
    {
        $sql = $this->conexao->prepare(USUARIO_SQL::VERIFICAR_EMAIL());
        $sql->bindValue(1, $email);
        $sql->execute();
        $ver_email = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $ver_email[0]['contar_email'] == 0 ? false : true;
    }

    public function CadastrarUsuarioMODEL($vo): int
    {
        $sql = $this->conexao->prepare(USUARIO_SQL::CADASTRAR_USUARIO());
        $i = 1;
        $sql->bindValue($i++, $vo->getNome());
        $sql->bindValue($i++, $vo->getTipo());
        $sql->bindValue($i++, $vo->getEmail());
        $sql->bindValue($i++, $vo->getCPF());
        $sql->bindValue($i++, $vo->getSenha());
        $sql->bindValue($i++, $vo->getStatus());
        $sql->bindValue($i++, $vo->getTelefone());

        try {
            $this->conexao->beginTransaction();

            // cadastra na tb_usuario
            $sql->execute();

            // recupera o id do usuário cadastrado
            $id_usuario = $this->conexao->lastInsertId();

            switch ($vo->getTipo()) {
                case USUARIO_TECNICO:
                    $sql = $this->conexao->prepare(USUARIO_SQL::CADASTRAR_USUARIO_TECNICO());
                    $i = 1;
                    $sql->bindValue($i++, $id_usuario);
                    $sql->bindValue($i++, $vo->getNomeEmpresa());
                    // cadastra na tb_tecnico
                    $sql->execute();
                    break;

                case USUARIO_FUNCIONARIO:
                    $sql = $this->conexao->prepare(USUARIO_SQL::CADASTRAR_USUARIO_FUNCIONARIO());
                    $i = 1;
                    $sql->bindValue($i++, $id_usuario);
                    $sql->bindValue($i++, $vo->getIdSetor());
                    // cadastra na tb_funcionario
                    $sql->execute();
                    break;
            }

            // PROCESSO QUE GRAVA O ENDEREÇO

            // PASSO 1 - verifica se a cidade daquele estado existe
            $sql = $this->conexao->prepare(USUARIO_SQL::VERIFICAR_CIDADE_CADASTRADA());
            $i = 1;
            $sql->bindValue($i++, $vo->getCidade());
            $sql->bindValue($i++, $vo->getEstado());

            $sql->execute();

            $tem_cidade = $sql->fetchAll(\PDO::FETCH_ASSOC);

            $id_cidade = 0;

            if (count($tem_cidade) > 0) {

                $id_cidade = $tem_cidade[0]['id_cidade'];

            } else {

                $id_estado = 0;

                // PASSO 2 - verifica se o estado existe
                $sql = $this->conexao->prepare(USUARIO_SQL::VERIFICAR_ESTADO_CADASTRADO());
                $sql->bindValue(1, $vo->getEstado());

                $sql->execute();

                $tem_estado = $sql->fetchAll(\PDO::FETCH_ASSOC);

                if (count($tem_estado) > 0) {

                    $id_estado = $tem_estado[0]['id'];

                } else {

                    // CADASTRA O ESTADO
                    $sql = $this->conexao->prepare(USUARIO_SQL::CADASTRAR_ESTADO());
                    $sql->bindValue(1, $vo->getEstado());

                    $sql->execute();

                    $id_estado = $this->conexao->lastInsertId();

                }

                $sql = $this->conexao->prepare(USUARIO_SQL::CADASTRAR_CIDADE());
                $sql->bindValue(1, $vo->getCidade());
                $sql->bindValue(2, $id_estado);

                $sql->execute();

                $id_cidade = $this->conexao->lastInsertId();
            }

            // PASSO 3 - CADASTRA O ENDEREÇO

            $sql = $this->conexao->prepare(USUARIO_SQL::CADASTRAR_ENDERECO());
            $i = 1;
            $sql->bindValue($i++, $vo->getRua());
            $sql->bindValue($i++, $vo->getBairro());
            $sql->bindValue($i++, $vo->getCep());
            $sql->bindValue($i++, $id_usuario);
            $sql->bindValue($i++, $id_cidade);

            $sql->execute();

            $this->conexao->commit();

            return 1;

        } catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($vo);
            return -1;
        }
    }

    public function FiltrarUsuarioMODEL(string $nome): array
    {
        $sql = $this->conexao->prepare(USUARIO_SQL::FILTRAR_USUARIO());
        $sql->bindValue(1, "%$nome%");
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function AlterarStatusMODEL(UsuarioVO $vo): int
    {
        $sql = $this->conexao->prepare(USUARIO_SQL::ALTERAR_STATUS());
        $i = 1;
        $sql->bindValue($i++, $vo->getStatus());
        $sql->bindValue($i++, $vo->getId());
        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex){
            $vo->setErroTecnico($ex->getMessage());
            parent::GravarErroLog($vo);
            return -1;
        }
    }

    public function DetalharUsuarioMODEL(string $id): array
    {
        $sql = $this->conexao->prepare(USUARIO_SQL::DETALHAR_USUARIO());
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }
}