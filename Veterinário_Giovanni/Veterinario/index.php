<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Veterinários</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Cadastro de Veterinários</h1>
        <br>
        <a href="cadastro.php" class="btn btn-primary mb-4">Adicionar</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código do(a) Veterinário(a)</th>
                    <th scope="col">Nome do(a) Veterinário(a)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $sql = "SELECT codvet, nomevet FROM tbveterinario";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['codvet']}</td>";
                    echo "<td>{$row['nomevet']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container mt-5">
        <a href="../index.php" class="btn btn-dark">Voltar</a>
    </div>
</body>
</html>