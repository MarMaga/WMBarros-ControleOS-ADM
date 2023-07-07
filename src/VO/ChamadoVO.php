<?php

namespace Src\VO;

use Src\_Public\Util;

class ChamadoVO
{
    private $id;
    private $data_abertura;
    private $hora_abertura;
    private $data_atendimento;
    private $hora_atendimento;
    private $data_encerramento;
    private $hora_encerramento;
    private $problema;
    private $laudo;
    private $id_equipamento;
    private $id_funcionario;
    private $id_tecnico_atendimento;
    private $id_tecnico_encerramento;

    // SET e GET id
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    // GET data_abertura
    public function getDataAbertura(): string
    {
        return Util::DataAtual();
    }

    // GET hora_abertura
    public function getHoraAbertura(): string
    {
        return Util::HoraAtual();
    }

    // GET data_atendimento
    public function getDataAtendimento(): string
    {
        return Util::DataAtual();
    }

    // GET hora_atendimento
    public function getHoraAtendimento(): string
    {
        return Util::HoraAtual();
    }

    // GET data_encerramento
    public function getDataEncerramento(): string
    {
        return Util::DataAtual();
    }

    // GET hora_encerramento
    public function getHoraEncerramento(): string
    {
        return Util::HoraAtual();
    }

    // SET e GET problema
    public function setProblema($problema): void
    {
        $this->problema = $problema;
    }
    public function getProblema(): string
    {
        return $this->problema;
    }

    // SET e GET laudo
    public function setLaudo($laudo): void
    {
        $this->laudo = $laudo;
    }
    public function getLaudo(): string
    {
        return $this->laudo;
    }

    // SET e GET id_equipamento
    public function setIdEquipamento($id_equipamento): void
    {
        $this->id_equipamento = $id_equipamento;
    }
    public function getIdEquipamento(): int
    {
        return $this->id_equipamento;
    }


    // SET e GET id_funcionario
    public function setIdFuncionario($id_funcionario): void
    {
        $this->id_funcionario = $id_funcionario;
    }
    public function getIdFuncionario(): int
    {
        return $this->id_funcionario;
    }

    // SET e GET id_tecnico_atendimento
    public function setIdTecnicoAtendimento($id_tecnico_atendimento): void
    {
        $this->id_tecnico_atendimento = $id_tecnico_atendimento;
    }
    public function getIdTecnicoAtendimento(): int
    {
        return $this->id_tecnico_atendimento;
    }

    // SET e GET id_tecnico_encerramento
    public function setIdTecnicoEncerramento($id_tecnico_encerramento): void
    {
        $this->id_tecnico_encerramento = $id_tecnico_encerramento;
    }
    public function getIdTecnicoEncerramento(): int
    {
        return $this->id_tecnico_encerramento;
    }
}


?>