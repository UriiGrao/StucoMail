<?php
session_start();
require_once "../bbdd.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SendMensa</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 0 || $_SESSION["type"] == 1) {
                ?>
                <h1>Enviar Mensaje!</h1>
                <div>Hola! 
                    <?php
                    $user1 = $_SESSION["login"];
                    echo "$user1";
                    ?>
                </div>
                <form method="POST">
                    Aquien enviar Mensaje: <select name='Name'>
                        <?php
                        $user = select2();
                        while ($option1 = mysqli_fetch_assoc($user)) {
                            echo "<option>" . $option1['username'] . "</option>";
                        }
                        ?>
                    </select> <br><br>
                    Asunto: <input type="text" name="subject"><br>
                    Cuerpo del mensaje: <input type="text" name="body">

                    <br><br>
                    <input type="submit" value="Enviar" name="boton" >
                </form>

                <?php
                if (isset($_POST["boton"])) {
                    $user = $_POST["Name"];
                    $body = $_POST["body"];
                    $subject = $_POST["subject"];
                    $registro = insertarMessage($user1, $user, $body, $subject);
                    insertarEventMensaje($user1);
                    if ($registro == "ok") {
                        echo "<p>Mensaje Enviado</p>";
                    } else {
                        echo "Error al enviar Mensaje<br>";
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
