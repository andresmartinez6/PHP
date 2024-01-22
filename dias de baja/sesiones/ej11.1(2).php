<?php


    session_start(); 
    $_SESSION["trans"]=time();
    $tiempo_trans=  $_SESSION["trans"] - $_SESSION["seg"];
    echo "Iniciaste sesión a las $_SESSION[hora] con un id ". session_id(). "  Y el tiempo transcurrido es de $tiempo_trans segundos";

   



?>