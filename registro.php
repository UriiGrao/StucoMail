<?php
session_start();
require_once 'bbdd.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
    </head>
    <body>
        <h1>Vamoh A Registranoh!</h1>
        <form action="Registro.php" method="POST">
            User: <input type="text" name="user" required><br><br>
            Password: <input type="password" name="pass" required><br><br>
            name: <input type="text" name="name" required><br><br>
            surname: <input type="text" name="sname" required><br><br>
            <?php
            if (isset($_SESSION["login"])) {
                if ($_SESSION["type"] == 1) {
                    ?>
                    Tipo: <select name="tipo">
                        <option value="1">Admin</option>
                        <option value="0">Usuario</option>
                    </select>
                    <?php
                }
            }
            ?>
            <input type="submit" value="Registrar" name="boton" >
            <a href="index.php">Volver Menu</a>
        </form>
        <?php
        if (isset($_POST["boton"])) {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $name = $_POST["name"];
            $sname = $_POST["sname"];
            $tipo = 0;
            if (isset($_SESSION["login"])) {
                if ($_SESSION["type"] == 1) {
                    $tipo = $_POST["tipo"];
                }
            } else {
                $tipo = 0;
            }
            if (usernameusados($user)) {
                echo "Usuario Repetit!";
            } else {
                $registro = insertarUsu($user, $pass, $name, $sname, $tipo);
                if ($registro == "ok") {
                    echo "<p>Usuario registrado en la base de datos</p>";
                } else {
                    echo "Error al registrar el Usuario $registro<br>";
                }
            }
        }
        ?>
        <a href="/Opciones/home.php">Volver Home</a>
    </body>
</html>
