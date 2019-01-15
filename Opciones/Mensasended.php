<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mensajes Enviados</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 0 || $_SESSION["type"] == 1) {
                ?>
                <?php
                $user1 = $_SESSION["login"];
                $user = selectmensajesend($user1);

                echo "<table>";
                echo "<tr>";
                echo "<th>idmessage</th><th>sender</th><th>receiver</th>"
                . "<th>date</th><th>read</th><th>subject</th><th>body</th>";
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
            }
        } else {
            echo "No hay ningún usuario logueado";
        }
        ?>
    </body>
</html>
