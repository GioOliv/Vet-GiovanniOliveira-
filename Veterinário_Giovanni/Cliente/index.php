<!DOCTYPE html>
<html>
<head>
    <title>Cadastro do Cliente</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Cadastro do Cliente</h1>
        <br>
        <a href="cadastro.php" class="btn btn-primary mb-4">Adicionar</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código do Cliente</th>
                    <th scope="col">Nome do Cliente</th>
                    <th scope="col">Telefone do Cliente</th>
                    <th scope="col">Email do Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $sql_cliente = "SELECT codcliente, nomecliente, telefonecliente, emailcliente FROM tbcliente";
                $stmt_cliente = $pdo->query($sql_cliente);
                while ($row_cliente = $stmt_cliente->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row_cliente['codcliente']}</td>";
                    echo "<td>{$row_cliente['nomecliente']}</td>";
                    echo "<td>{$row_cliente['telefonecliente']}</td>";
                    echo "<td>{$row_cliente['emailcliente']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código do Animal</th>
                    <th scope="col">Nome do Animal</th>
                    <th scope="col">Foto do Animal</th>
                    <th scope="col">Cód. Tipo de Animal</th>
                    <th scope="col">Tipo de Animal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_animal = "SELECT codanimal, nomeanimal, fotoanimal, codtipoanimal FROM tbanimal";
                $stmt_animal = $pdo->query($sql_animal);
                while ($row_animal = $stmt_animal->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row_animal['codanimal']}</td>";
                    echo "<td>{$row_animal['nomeanimal']}</td>";
                    echo "<td>{$row_animal['fotoanimal']}</td>";

                    // Consulta para obter o tipo de animal
                    $sql_tipo = "SELECT codtipoanimal, tipoanimal FROM tbtipoanimal WHERE codtipoanimal = ?";
                    $stmt_tipo = $pdo->prepare($sql_tipo);
                    $stmt_tipo->execute([$row_animal['codtipoanimal']]);
                    $row_tipo = $stmt_tipo->fetch(PDO::FETCH_ASSOC);

                    echo "<td>{$row_tipo['codtipoanimal']}</td>";
                    echo "<td>{$row_tipo['tipoanimal']}</td>";
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