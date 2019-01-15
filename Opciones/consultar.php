<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bandeja Entrada</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 0 || $_SESSION["type"] == 1) {
                ?>
                <?php
                $user1 = $_SESSION["login"];
                insertarEventBandeja($user1);
                
                $bd = BandejaEntrada($user1);
                
                echo "<table>";
                echo "<tr>";
                echo "<th>sender</th><th>date</th><th>subject</th><th>read</th>";
                echo "</tr>";
                while ($fila = mysqli_fetch_assoc($bd)) {
                    echo "<tr>";
                    foreach ($fila as $dato) {
                        echo "<td>$dato</td>";
                    }
                    echo "</tr>";
                }
                ?>
                <a href="home.php">Volver Menu</a>
                <?php
            }
        } else {
            echo "No hay ningún usuario logueado";
        }
        ?>
    </body>
</html>
