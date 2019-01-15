<?php
session_start();
require_once "bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>StucoMail</title>
    </head>
    <body>
        <h1>StucoMail!</h1>
        <form method="POST">
            Login: <input type="text" name="log" required><br><br>
            Password: <input type="password" name="pass" required><br><br>
            <input type="submit" name="login" value="Entrar">
        </form>
        <a href="Registro.php">Registrarse</a>
        <?php
        if (isset($_POST["login"])) {
            $user = $_POST["log"];
            $pass = $_POST["pass"];
            if (validarUser($user, $pass)) {
                $_SESSION["login"] = $user;
                $tipo = tipouser($user);
                $_SESSION["type"] = $tipo;
                echo "Has entrat be!";
                if ($tipo == 1) {
                    header("Location: Opciones/home.php");
                } elseif ($tipo == 0) {
                    insertarEventIndice($user);
                    header("Location: Opciones/home.php");
                }
            } else {
                echo "Usuario o contraseña incorrecta";
            }
        }
        ?>
    </body>
</html>
