<?php
    //llamada al modelo
    require_once "modelos/modelo_alumnos.php";
    $per=new modelo_alumnos();

    if(isset($_POST["nom"]) && $_POST["nom"]!=""){
        //si han introducido algo,llamo a un metodo
        $datos=$per->get_alumnos_nombre($_POST["nom"]);
    }else{
        //si no han introducido nada,llamo a otro metodo
        $datos=$per->get_alumnos();
    }
    //llamada a la vista
    //a la vista le da igual si hay muchos alumnos en  $datos
    //o solo uno
    include "vistas/vista_alumnos.php";
?>
