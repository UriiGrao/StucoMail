<html>
    <head>
        <meta charset="UTF-8">
        <title>Cerrar Sesion</title>
    </head>
    <body>
        <?php
        session_start();

        $name = $_SESSION["login"];
        echo "Hasta la próxima $name<br>";
        session_destroy();
        ?>
        <p><a href="../index.php">Volver indice</a></p>
    </body>
</html>
