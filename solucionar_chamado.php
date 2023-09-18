<?php
// Inclui o arquivo de conexão
require_once "conexao.php";

// Verifica se o ID do chamado foi passado pela URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_chamado = $_GET['id'];

    // Exclui o registro da tabela "chamados"
    $sql = "DELETE FROM chamados WHERE id = $id_chamado";

    if (mysqli_query($conexao, $sql)) {
        // Redireciona de volta para a página de listagem de chamados após excluir
        header("Location: listar_chamados.php");
        exit();
    } else {
        echo "Erro ao excluir o chamado: " . mysqli_error($conexao);
    }
} else {
    echo "ID de chamado inválido.";
}
?>

