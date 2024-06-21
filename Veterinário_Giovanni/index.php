<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Index</h2>
        <div class="row mt-4">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atendimentos</h5>
                        <p class="card-text">Acesso aos Atendimentos agendados.</p>
                        <a href="Atendimento/" class="btn btn-dark">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cliente</h5>
                        <p class="card-text">Acesso ao cadastro dos clientes.</p>
                        <a href="Cliente/" class="btn btn-dark">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Veterinário</h5>
                        <p class="card-text">Acesse o cadastro de veterinários.</p>
                        <a href="Veterinario/" class="btn btn-dark">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Informações de Clientes e Animais</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código do Cliente</th>
                    <th scope="col">Nome do Cliente</th>
                    <th scope="col">Telefone do Cliente</th>
                    <th scope="col">Email do Cliente</th>
                    <th scope="col">Nome do Animal</th>
                    <th scope="col">Foto do Animal</th>
                    <th scope="col">Tipo de Animal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');

                $sql = "SELECT c.codcliente, c.nomecliente, c.telefonecliente, c.emailcliente, a.nomeanimal, a.fotoanimal, ta.tipoanimal
                        FROM tbcliente c
                        JOIN tbanimal a ON c.codcliente = a.codcliente
                        JOIN tbtipoanimal ta ON a.codtipoanimal = ta.codtipoanimal";

                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['codcliente']}</td>";
                    echo "<td>{$row['nomecliente']}</td>";
                    echo "<td>{$row['telefonecliente']}</td>";
                    echo "<td>{$row['emailcliente']}</td>";
                    echo "<td>{$row['nomeanimal']}</td>";
                    echo "<td>{$row['fotoanimal']}</td>";
                    echo "<td>{$row['tipoanimal']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>