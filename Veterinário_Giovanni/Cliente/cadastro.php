<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomecliente = $_POST['nomecliente'];
    $telefonecliente = $_POST['telefonecliente'];
    $emailcliente = $_POST['emailcliente'];
    $nomeanimal = $_POST['nomeanimal'];
    $tipoanimal = $_POST['tipoanimal'];
    $fotoanimal = $_POST['fotoanimal'];

    // Inserir cliente
    $stmt_cliente = $pdo->prepare('INSERT INTO tbcliente(nomecliente, telefonecliente, emailcliente) VALUES (?, ?, ?)');
    $stmt_cliente->execute([$nomecliente, $telefonecliente, $emailcliente]);
    $codcliente = $pdo->lastInsertId(); // Obtém o último ID inserido

    // Verificar se o tipo de animal já existe
    $stmt_check_tipo = $pdo->prepare('SELECT codtipoanimal FROM tbtipoanimal WHERE tipoanimal = ?');
    $stmt_check_tipo->execute([$tipoanimal]);
    $row_tipo = $stmt_check_tipo->fetch(PDO::FETCH_ASSOC);

    // Se o tipo de animal não existe, inserir na tabela tbtipoanimal
    if (!$row_tipo) {
        $stmt_tipo = $pdo->prepare('INSERT INTO tbtipoanimal(tipoanimal) VALUES (?)');
        $stmt_tipo->execute([$tipoanimal]);
        $codtipoanimal = $pdo->lastInsertId(); // Obtém o último ID inserido
    } else {
        $codtipoanimal = $row_tipo['codtipoanimal'];
    }

    // Inserir animal
    $stmt_animal = $pdo->prepare('INSERT INTO tbanimal(nomeanimal, fotoanimal, codcliente, codtipoanimal) VALUES (?, ?, ?, ?)');
    $stmt_animal->execute([$nomeanimal, $fotoanimal, $codcliente, $codtipoanimal]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Cliente e Animal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Cadastro de Cliente e Animal</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nomecliente">Nome do Cliente:</label>
                <input type="text" class="form-control" name="nomecliente" required>
            </div>
            <div class="form-group">
                <label for="telefonecliente">Telefone do Cliente:</label>
                <input type="text" class="form-control" name="telefonecliente" required>
            </div>
            <div class="form-group">
                <label for="emailcliente">E-mail do Cliente:</label>
                <input type="email" class="form-control" name="emailcliente" required>
            </div>
            <hr>
            <div class="form-group">
                <label for="nomeanimal">Nome do Animal:</label>
                <input type="text" class="form-control" name="nomeanimal" required>
            </div>
            <div class="form-group">
                <label for="tipoanimal">Tipo do Animal:</label>
                <input type="text" class="form-control" name="tipoanimal" required>
            </div>
            <div class="form-group">
                <label for="fotoanimal">Foto do Animal:</label>
                <input type="file" class="form-control" name="fotoanimal" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
</html>