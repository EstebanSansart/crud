<?php

    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header("location:index.php?mensaje=error");
    }

    include_once "model/conexion.php";
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];

    $sentencia = $bd -> prepare("UPDATE persona SET nombre = ?, edad = ?, signo = ? WHERE codigo = ?;");
    $resultado = $sentencia -> execute([$nombre, $edad, $signo, $codigo]);

    if ($resultado === true) {
        header("location:index.php?mensaje=editado");
    } else {
        header("location:index.php?mensaje=error");
        exit();
    }
    

?>