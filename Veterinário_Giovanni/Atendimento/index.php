<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Atendimento</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Cadastro de Atendimento</h1>
        <br>
        <a href="cadastro.php" class="btn btn-primary mb-4">Adicionar</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código do Atendimento</th>
                    <th scope="col">Data do Atendimento</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Código do Veterinário</th>
                    <th scope="col">Código do Animal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $sql = "SELECT codatendimento, dataatendimento, horaatendimento, codvet, codanimal FROM tbatendimento";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['codatendimento']}</td>";
                    echo "<td>{$row['dataatendimento']}</td>";
                    echo "<td>{$row['horaatendimento']}</td>";
                    echo "<td>{$row['codvet']}</td>";
                    echo "<td>{$row['codanimal']}</td>";
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