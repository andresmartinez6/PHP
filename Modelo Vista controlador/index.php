<?php

    echo"<form action='#' method='POST'>
            Nombre del alumno:
            <input type="text" name='nom'>
            <br>
            <input type='submit' value='Aceptar' name='enviar'>
    </form>";

    if(isset($_POST["enviar"])){
        include "bd/bd.php";
        include "controladores/controlador_alumnos.php";
    }

?>