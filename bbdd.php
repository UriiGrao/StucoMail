<?php
function BandejaEntrada($user){
    $c = conectar();
    $select = "SELECT sender, date, subject, message.read FROM message WHERE receiver = '$user'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
function cotilleo($user) {
    $c = conectar();
    $select = "SELECT date FROM event WHERE user = '$user' AND type = 'I'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function ranking() {
    $c = conectar();
    $select = "SELECT count(*) as Mensajes, sender FROM message GROUP BY sender ORDER BY Mensajes desc LIMIT 10";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectmensajesend1() {
    $c = conectar();
    $select = "SELECT sender, receiver, date, message.read, subject FROM message ORDER BY date desc";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function eliminarUsu($user) {
    $c = conectar();
    $select = "DELETE FROM user WHERE username = '$user'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectuser() {
    $c = conectar();
    $select = "SELECT * FROM user";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectmensajesend($user) {
    $c = conectar();
    $select = "SELECT * FROM message WHERE sender = '$user' ORDER BY date desc";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function insertarMessage($user1, $user, $body, $subject) { /* ELS VALORES ENTREN BE */
    $c = conectar();
    $insert = "INSERT INTO message VALUES ('','$user1', '$user' ,now(), '0', '$subject', '$body')";
    if (mysqli_query($c, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function select2() {
    $c = conectar();
    $select = "SELECT username FROM user";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function cambiarpass($user, $pass1) {
    $c = conectar();
    $select = "UPDATE user SET password = '$pass1' WHERE username = '$user'";
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function validarPass($pass) {
    $c = conectar();
    $select = "SELECT password FROM user WHERE password = '$pass'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    if (mysqli_num_rows($resultado) == 1) {
        return true;
    } else {
        return false;
    }
}

function insertarEventMensaje($user) {
    $c = conectar();
    $insert = "INSERT INTO event (user, date, type) VALUES ('$user', now(), 'R')";
    if (mysqli_query($c, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function insertarEventBandeja($user) {
    $c = conectar();
    $insert = "INSERT INTO event (user, date, type) VALUES ('$user', now(), 'C')";
    if (mysqli_query($c, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function insertarEventIndice($user) {
    $c = conectar();
    $insert = "INSERT INTO event (user, date, type) VALUES ('$user', now(), 'I')";
    if (mysqli_query($c, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function usernameusados($n) {
    $c = conectar();
    $select = "SELECT username FROM user WHERE username = '$n'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    if (mysqli_num_rows($resultado) == 1) {
        return true;
    } else {
        return false;
    }
}

function insertarUsu($username, $password, $name, $surname, $type) {
    $c = conectar();
    $insert = "INSERT INTO user VALUES ('$username', '$password', '$name', '$surname', $type)";
    if (mysqli_query($c, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function tipouser($user) {
    $c = conectar();
    $select = "SELECT type FROM user WHERE username = '$user'";
    $resultado = mysqli_query($c, $select);
    mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado);
    extract($fila);
    desconectar($c);
    return $type;
}

function validarUser($user, $pass) {
    $c = conectar();
    $select = "SELECT username FROM user WHERE username = '$user' AND password = '$pass'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    if (mysqli_num_rows($resultado) == 1) {
        return true;
    } else {
        return false;
    }
}

function desconectar($conexion) {
    mysqli_close($conexion);
}

function conectar() {
    $conexion = mysqli_connect("localhost", "root", "", "msg");
    if (!$conexion) {
        die("No se ha podido establecer la conexión con el servidor");
    }
    return $conexion;
}
