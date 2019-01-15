<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ultima Connect</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 1) {
                ?>
                <h1>Ultima Conexcion</h1>
                Elige Usuario:
                <form method="POST">
                    <select name='Name'>
                        <?php
                        $user = select2();
                        while ($option1 = mysqli_fetch_assoc($user)) {
                            echo "<option>" . $option1['username'] . "</option>";
                        }
                        ?>
                    </select> <br><br>
                    <br><br>
                    <input type="submit" value="Enviar" name="boton" >
                </form>
                <a href="home.php">Volver Menu</a>
                <?php
                if (isset($_POST["boton"])) {
                    $user1 = $_POST["Name"];

                    $date = cotilleo($user1);

                    echo "<table>";
                    echo "<tr>";
                    echo "<th>date</th>";
                    echo "</tr>";
                    while ($fila = mysqli_fetch_assoc($date)) {
                        echo "<tr>";
                        foreach ($fila as $dato) {
                            echo "<td>$dato</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
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
