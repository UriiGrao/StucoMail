<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ver Usuarios</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 1) {
                ?>
                <?php
                $user1 = $_SESSION["login"];

                $listuser = selectuser();

                echo "<table>";
                echo "<tr>";
                echo "<th>username</th><th>password</th><th>name</th><th>surname</th><th>type</th>";
                echo "</tr>";
                while ($fila = mysqli_fetch_assoc($listuser)) {
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
