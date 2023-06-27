<?php

    if(!isset($_GET['codigo'])){
        header("location:index.php?mensaje=error");
        exit();
    }

    include_once "model/conexion.php";
    $codigo = $_GET['codigo'];

    $sentencia = $bd -> prepare("DELETE FROM persona WHERE codigo = ?;");
    $resultado = $sentencia -> execute([$codigo]);

    if ($resultado === true) {
        header("location:index.php?mensaje=eliminado");
    } else {
        header("location:index.php?mensaje=error");
    }
    

?>