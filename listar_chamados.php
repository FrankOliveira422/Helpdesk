<?php
// Inclui o arquivo de conexão
require_once "conexao.php";

// Função para obter o IP formatado (opcional)
function formatarIP($ip) {
    return ($ip === null) ? "IP desconhecido" : $ip;
}

// Verifica se o chamado foi solucionado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id_chamado = $_POST["id"];

    // Atualiza o status do chamado para solucionado (solucionado = 1)
    $sql = "UPDATE chamados SET solucionado = 1 WHERE id = $id_chamado";

    if (mysqli_query($conexao, $sql)) {
        // Redireciona de volta para a página de listagem de chamados após atualizar o status
        header("Location: listar_chamados.php");
        exit();
    } else {
        echo "Erro ao solucionar o chamado: " . mysqli_error($conexao);
    }
}

// Busca os chamados abertos
$sql_abertos = "SELECT * FROM chamados WHERE solucionado = 0";
$resultado_abertos = mysqli_query($conexao, $sql_abertos);

// Busca os chamados solucionados
$sql_resolvidos = "SELECT * FROM chamados WHERE solucionado = 1";
$resultado_resolvidos = mysqli_query($conexao, $sql_resolvidos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ... código anterior do cabeçalho ... -->
</head>
<body>
    <header>
        <!-- Cabeçalho anterior... -->
    </header>

    <div class="container">
        <!-- Conteúdo anterior... -->

        <!-- Dashboard de frequência de solução dos chamados... -->

        <!-- Lista de chamados abertos -->
        <h2>Chamados Abertos</h2>
        <table border="1">
            <!-- ... Cabeçalho da tabela ... -->
            <?php
            while ($chamado = mysqli_fetch_assoc($resultado_abertos)) {
                echo "<tr>";
                echo "<td>{$chamado['id']}</td>";
                echo "<td>{$chamado['assunto']}</td>";
                echo "<td>{$chamado['descricao']}</td>";
                echo "<td>{$chamado['solucionado']}</td>";
                echo "<td>" . formatarIP($chamado['ip']) . "</td>";
                echo "<td>{$chamado['data_criacao']}</td>";
                echo "<td>
                        <form action='listar_chamados.php' method='POST'>
                            <input type='hidden' name='id' value='{$chamado['id']}'>
                            <button type='submit'>Solucionar</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!-- Coluna de chamados solucionados -->
    <div class="container">
        <h2>Chamados Solucionados</h2>
        <table border="1">
            <!-- ... Cabeçalho da tabela ... -->
            <?php
// Inclui o arquivo de conexão
require_once "conexao.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["excluir_id"])) {
    $id_chamado_excluir = $_POST["excluir_id"];

    // Exclui o registro da tabela "chamados"
    $sql = "DELETE FROM chamados WHERE id = $id_chamado_excluir";

    if (mysqli_query($conexao, $sql)) {
        // Redireciona de volta para a página de listagem de chamados após excluir
        header("Location: listar_chamados.php");
        exit();
    } else {
        echo "Erro ao excluir o chamado: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ... código anterior do cabeçalho ... -->
</head>
<body>
    <header>
        <h1>Gov Desk</h1>
    </header>
    <div class="container">
        <h2>Chamados Solucionados</h2>
        <table border="1">
            <!-- ... Cabeçalho da tabela ... -->
            <?php
            while ($chamado = mysqli_fetch_assoc($resultado_resolvidos)) {
                echo "<tr>";
                echo "<td>{$chamado['id']}</td>";
                echo "<td>{$chamado['assunto']}</td>";
                echo "<td>{$chamado['descricao']}</td>";
                echo "<td>{$chamado['solucionado']}</td>";
                echo "<td>" . formatarIP($chamado['ip']) . "</td>";
                echo "<td>{$chamado['data_criacao']}</td>";
                echo "<td>
                        <form action='listar_chamados.php' method='POST'>
                            <input type='hidden' name='excluir_id' value='{$chamado['id']}'>
                            <button type='submit'>Excluir</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

            <?php
            
            while ($chamado = mysqli_fetch_assoc($resultado_resolvidos)) {
                echo "<tr>";
                echo "<td>{$chamado['id']}</td>";
                echo "<td>{$chamado['assunto']}</td>";
                echo "<td>{$chamado['descricao']}</td>";
                echo "<td>{$chamado['solucionado']}</td>";
                echo "<td>" . formatarIP($chamado['ip']) . "</td>";
                echo "<td>{$chamado['data_criacao']}</td>";
                echo "</tr>";
            }
            
            ?>
        </table>
        
    </div>
</body>

</html>


<!-- ... código anterior ... -->




<?php
// ... código anterior do arquivo listar_chamados.php ...
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ... código anterior do cabeçalho ... -->
</head>
<body>
    <h1>Voltar ao cadastro</h1>

    <!-- Botão para voltar ao index -->
    <a href="index.php">Voltar ao Início</a>

    <!-- Botão para ir à página de cadastro de chamados -->
    <button type="button" onclick="window.location.href='cadastrar_chamado.php'">Cadastrar Novo Chamado</button>

    <table border="1">
        <!-- ... código anterior da tabela de chamados ... -->
    </table>
</body>
</html>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk - Chamados Cadastrados</title>
    <style>
        /* Estilos anteriores... */
    </style>
</head>
<body>
    <header>
        <!-- Cabeçalho antigo... -->
    </header>

    <div class="container">
        <!-- Conteúdo antigo... -->

        <!-- Dashboard de frequência de solução dos chamados -->
        <div class="dashboard">
            <h2>Dashboard de Frequência de Solução dos Chamados</h2>
            <table border="1">
                <tr>
                    <th>Status</th>
                    <th>Quantidade</th>
                </tr>
                <tr>
                    <td>Abertos</td>
                    <td>
                        <?php
                            // Consulta SQL para obter a quantidade de chamados abertos
                            $sqlAbertos = "SELECT COUNT(*) AS quantidade FROM chamados WHERE solucionado = 0";
                            $resultadoAbertos = mysqli_query($conexao, $sqlAbertos);
                            $dadosAbertos = mysqli_fetch_assoc($resultadoAbertos);
                            echo $dadosAbertos['quantidade'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Solucionados</td>
                    <td>
                        <?php
                            // Consulta SQL para obter a quantidade de chamados solucionados
                            $sqlSolucionados = "SELECT COUNT(*) AS quantidade FROM chamados WHERE solucionado = 1";
                            $resultadoSolucionados = mysqli_query($conexao, $sqlSolucionados);
                            $dadosSolucionados = mysqli_fetch_assoc($resultadoSolucionados);
                            echo $dadosSolucionados['quantidade'];
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>



<?php
// ... código anterior do arquivo listar_chamados.php ...
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk - Chamados Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Estilização da tabela de chamados */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        /* Estilização dos botões */
        .details-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        .details-button:hover {
            background-color: #0056b3;
        }

        /* Estilização do cabeçalho */
        header {
            background-color: #007BFF;
            padding: 10px;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
    
</head>
<body>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk - Chamados Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Estilização da tabela de chamados... */

        /* Estilização dos botões... */

        /* Estilização do cabeçalho */
        header {
            background-color: #007BFF;
            padding: 10px;
            color: #fff;
            text-align: center; /* Centraliza o conteúdo do cabeçalho */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gov Desk</h1>
    </header>
    <div class="container">

    
        <!-- Restante do conteúdo do arquivo listar_chamados.php -->














