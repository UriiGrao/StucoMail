<?php
session_start();
require_once "../bbdd.php";
$user1 = $_SESSION["login"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ranking</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 1) {
                ?>
                <h1>Ranking </h1>
                <?php
                $user = ranking();

                echo "<table>";
                echo "<tr>";
                echo "<th>Mensajes</th><th>sender</th>";
                echo "</tr>";
                while ($fila = mysqli_fetch_assoc($user)) {
                    echo "<tr>";
                    foreach ($fila as $dato) {
                        echo "<td>$dato</td>";
                    }
                    echo "</tr>";
                }
                ?>
                <a href="home.php">Volver Menu</a>
                <?php
            } else {
                echo "Tú no eres Admin, Payas@!";
            }
        } else {
            echo "No hay ningún usuario logueado";
        }
        ?>
    </body>
</html>
