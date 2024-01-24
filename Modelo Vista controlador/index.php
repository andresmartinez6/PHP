<?php

    echo"<form action='#' method='POST'>
            Nombre del alumno:
            <input type='text' name='nom'>
            <br>
            <input type='submit' name='enviar'>
    </form>";

    if(isset($_POST["enviar"])){
        include "./bd/bd.php";
        include "./controlador/controlador_alumnos.php";
    }

?>