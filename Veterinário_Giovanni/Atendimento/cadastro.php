<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dataatendimento = $_POST['dataatendimento'];
    $horaatendimento = $_POST['horaatendimento'];
    $codvet = $_POST['codvet'];
    $codanimal = $_POST['codanimal'];

    // Verifica se o codvet e o codanimal estão disponíveis
    $stmt_check = $pdo->prepare('SELECT * FROM tbatendimento WHERE codvet = ? AND codanimal = ?');
    $stmt_check->execute([$codvet, $codanimal]);
    $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        echo "Este veterinário já possui um agendamento para este animal. Por favor, escolha outro.";
    } else {
        // Insere o agendamento
        $stmt_insert = $pdo->prepare('INSERT INTO tbatendimento(dataatendimento, horaatendimento, codvet, codanimal) VALUES (?, ?, ?, ?)');
        $stmt_insert->execute([$dataatendimento, $horaatendimento, $codvet, $codanimal]);

        header('Location: index.php');
        exit;
    }
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
                <label for="dataatendimento">Data do Atendimento:</label>
                <input type="date" class="form-control" name="dataatendimento" required>
            </div>
            <div class="form-group">
                <label for="horaatendimento">Horário:</label>
                <input type="time" class="form-control" name="horaatendimento" required>
            </div>
            <div class="form-group">
                <label for="codvet">Código do Veterinário:</label>
                <select class="form-control" name="codvet" required>
                    <?php
                    $stmt_vet = $pdo->query('SELECT codvet, nomevet FROM tbveterinario');
                    while ($row_vet = $stmt_vet->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row_vet['codvet']}'>{$row_vet['codvet']} - {$row_vet['nomevet']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="codanimal">Código do Animal:</label>
                <select class="form-control" name="codanimal" required>
                    <?php
                    $stmt_animal = $pdo->query('SELECT codanimal, nomeanimal FROM tbanimal');
                    while ($row_animal = $stmt_animal->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row_animal['codanimal']}'>{$row_animal['codanimal']} - {$row_animal['nomeanimal']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
</html>