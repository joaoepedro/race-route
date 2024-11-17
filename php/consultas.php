<?php

include_once("conexao.php");

$sql = "select * form projeto";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <a href="index.php">
                <li>Cadastro</li>
            </a>
            <a href="consultas.php">
                <li>Consultas</li>
            </a>
        </ul>
    </nav>
    <section>
        <h1>Consultas</h1>
        <br>
        <?php

        print("$registros registros encontrados.")

        ?>
    </section>
</body>

</html>