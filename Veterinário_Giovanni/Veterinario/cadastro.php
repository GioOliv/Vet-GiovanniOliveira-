<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codvet = $_POST['codvet'];
    $nomevet = $_POST['nomevet'];

    $stmt = $pdo->prepare('INSERT INTO tbveterinario(codvet,nomevet) VALUES (?, ?)');
    $stmt->execute([$codvet, $nomevet]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Veterinário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Veterinário(a)</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nomevet">Nome do Veterinário(a):</label>
                <input type="text" class="form-control" name="nomevet" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
</html>