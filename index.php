<!DOCTYPE html>
<html>
<head>
    <title>Agendamentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agendamentos</h1>

        <?php
        // Código PHP para recuperar e exibir os dados do banco de dados
        $link = mysqli_connect("localhost:3306", "root", "", "projetoweb");
        // Verificar a conexão

        if (!$link){
            echo "Error:  Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            exit;
        }

        $sql = "SELECT * FROM agendamentos";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Bairro</th><th>CEP</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['endereco']."</td>";
                echo "<td>".$row['bairro']."</td>";
                echo "<td>".$row['cep']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum agendamento encontrado.";
        }

        mysqli_close($link);
        ?>
    </div>
</body>
</html>