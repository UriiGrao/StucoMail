<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar Usuario</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 1) {
                ?>
                <h1>Eliminar Usuario</h1>
                <form method="POST">
                    A qui Vols Eliminar: <select name='Name'>
                        <?php
                        $user = select2();
                        while ($option1 = mysqli_fetch_assoc($user)) {
                            echo "<option>" . $option1['username'] . "</option>";
                        }
                        ?>
                    </select> <br><br>
                    <input type="submit" value="Borrar" name="boton" >
                    <a href="home.php">Volver Menu</a>
                </form>
                <?php
                if (isset($_POST["boton"])) {
                    $user = $_POST["Name"];

                    eliminarUsu($user);
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
