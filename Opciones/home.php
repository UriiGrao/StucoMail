<?php
session_start();
require_once "../bbdd.php";
$user1 = $_SESSION["login"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["login"])) {
            if ($_SESSION["type"] == 0 || $_SESSION["type"] == 1) {
                ?>
                <h1>A elegir!</h1>
                Welcome! <?php echo "$user1"; ?><br><br>

                <h1>Opciones:</h1>
                <p><a href="cambiarpass.php">Cambiar La Password</a></p>
                <p><a href="sendmensa.php">Enviar Mensaje</a></p>
                <p><a href="consultar.php">Consultar Bandeja Entrada</a></p>
                <p><a href="Mensasended.php">Mensajes Enviados</a></p>
                <p><a href="CloseSesion.php">Cerrar Sesion</a></p>
                <?php
                $type = tipouser($user1);
                if ($type == 1) {
                    ?>    
                    <h1>Nomes per a Administradors!</h1>
                    <p><a href="verusus.php">Consultar Lista Usuarios</a></p>
                    <p><a href="../registro.php">Registrar Usuarios</a></p>
                    <p><a href="DeleteUsu.php">Borrar Usuarios</a></p>
                    <p><a href="allmesaje.php">Todos Los Mensajes</a></p>
                    <p><a href="lastconnect.php">Cotilleo de Ultima Conexion</a></p>
                    <p><a href="RankingPopus.php">Ranking</a></p>
                    <?php
                }
                ?>
                <?php
            }
        } else {
            echo "No hay ningún usuario logueado";
        }
        ?>
    </body>
</html>
