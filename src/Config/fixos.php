<?php

define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/');
//define('PATH', $_SERVER['DOCUMENT_ROOT'] . 'ControleOS-ADM/src/');
//define('PATH', $_SERVER['DOCUMENT_ROOT'] . 'ControleOS-ADM/src/');

define('BASE_PATH_INICIAL', 'http://localhost:8000/view/acesso/inicial_adm.php');

const SITUACAO_ATIVO = 1;
const SITUACAO_INATIVO = 0;

// FLAG ALOCAÇÃO
const SITUACAO_EQUIPAMENTO_ALOCADO = 1;
const SITUACAO_EQUIPAMENTO_DESALOCADO = 2;
const SITUACAO_EQUIPAMENTO_MANUTENCAO = 3;

// TIPOS DE USUÁRIO
const USUARIO_ADM = 1;
const USUARIO_FUNCIONARIO = 2;
const USUARIO_TECNICO = 3;

// TIPOS DE TELA
const ESTADO_TELA_NOVO = 'Novo';
const ESTADO_TELA_ALTERAR = 'Alterar';

?>