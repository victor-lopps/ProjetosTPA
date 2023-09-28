<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    if(!isset($_SESSION['user_id'])) {
        echo "Sem permissão para acesso a página<br>";
        echo '<a href="index.php">Ir para página inicial</a>';
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel do Usuário</title>
</head>
<body>
    <h2>Painel do Usuário</h2>
    <p>Bem-vindo, usuário!</p>
    <p>Clique para gerar o <a href="gera_pdf.php" target="_blank">Relatório Mensal</a></p>
    <h2>TREINO CRUD</h2>
    <p>Clique para <a href="create.php">Criar (CREATE)</a></p>
    <p>Clique para <a href="read.php">Ler (READ)</a></p>
    <hr>
    <a href="logout.php">Sair</a>
</body>
</html>