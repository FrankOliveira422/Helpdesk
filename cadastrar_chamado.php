<?php
// Inclui o arquivo de conexão
require_once "conexao.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $assunto = $_POST["assunto"];
    $descricao = $_POST["descricao"];

    // Captura o IP do cliente
    $ip_cliente = $_SERVER['REMOTE_ADDR'];

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conexao) {
        // Prepara a consulta SQL
        $sql = "INSERT INTO chamados (assunto, descricao, ip) VALUES ('$assunto', '$descricao', '$ip_cliente')";

        // Executa a consulta
        if (mysqli_query($conexao, $sql)) {
            echo "Chamado cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o chamado: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro na conexão com o banco de dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ...código anterior do cabeçalho... -->
</head>
<body>
    <!-- ...código anterior do formulário... -->

    <!-- Botão para ir à página de listagem de chamados -->
    <button type="button" onclick="window.location.href='listar_chamados.php'">Ir para a Lista de Chamados</button>
</form>
</body>
</html>

