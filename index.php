<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        h1 {
            margin-top: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>GOV DESK</h1>
    </header>

    <div class="container">
        <p>Bem-vindo ao nosso sistema de Help Desk. Aqui você pode abrir chamados para solicitar suporte técnico.</p>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
</head>
<body>
    <h1>Sistema Help Desk</h1>
    <form action="cadastrar_chamado.php" method="POST">
        <label for="assunto">Assunto:</label>
        <input type="text" id="assunto" name="assunto" required><br>
        <label for="descricao">Local de Chamado:</label>
        <textarea id="descricao" name="descricao" required></textarea><br>
        <button type="submit">Abrir Chamado</button>
    </form>
</body>
</html>

        <!-- Botão para ir à lista de chamados -->
        <a class="btn" href="listar_chamados.php">Ver Chamados</a>
    </div>
</body>
</html>