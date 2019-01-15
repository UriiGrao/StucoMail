<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CambiarPass</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 0 || $_SESSION["type"] == 1) {
                ?>
                <h1>Password!</h1>
                <form method="POST">
                    Password: <input type="password" name="pass" required><br><br>
                    Password New: <input type="password" name="passn" required><br><br>
                    Password New Verificar: <input type="password" name="passnv" required><br><br>
                    <input type="submit" name="boton" value="Cambiar">
                </form>

                <?php
                if (isset($_POST["boton"])) {
                    $pass2 = $_POST["passn"];
                    $pass = $_POST["pass"];
                    $pass1 = $_POST["passnv"];
                    $user = $_SESSION["login"];
                    if (validarPass($pass)) {
                        if ($pass2 == $pass1) {
                            cambiarpass($user, $pass1);
                            echo "La password esta cambiada";
                        } else {
                            echo 'La Nova Password No Coinsideix!.';
                        }
                    } else {
                        echo 'La Password Actual Esta Malament!.';
                    }
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
