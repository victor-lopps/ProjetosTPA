<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "Sem permissão para acesso a página<br>";
    echo '<a href="index.php">Ir para a página inicial</a>';
    exit;
}
require('pdo_con.php');

// Função para inserir um novo registro no banco de dados
function inserirRegistro($pdo, $nome, $email) {
    $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    return $stmt->execute();
}

// Processar o formulário para inserir um novo registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (inserirRegistro($pdo, $nome, $email)) {
        $_SESSION['mensagem'] = 'Registro inserido com sucesso!';
    }
    else {
        $_SESSION['mensagem'] = 'Erro ao inserir o registro';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário CRUD com PHP e MySQL</title>
</head>
<body>
    <h1>INSERIR REGISTRO - CREATE</h1>
    <?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" name="submit" value="Inserir Registro">
    </form>    
    <hr>
    <a href="dashboard.php">Dashboard</a><br>
    <a href="logout.php">Sair</a>
</body>
</html>
