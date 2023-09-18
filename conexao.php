<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = ""; // deixe em branco caso não tenha senha
$banco = "helpdesk";

// Conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão: " . mysqli_connect_error());
}
