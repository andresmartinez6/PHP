<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if (isset($_GET['enviar'])) {
        
            $cad=$_GET['cadena'];
            $long=$_GET['logitud'];
            $letra1 = $_GET['letra1'];
            $letra2 = $_GET['letra2'];
            $letra3 = $_GET['letra3'];
            $letra4 = $_GET['letra4'];
            $l1=$_GET['l1'];
            $l2=$_GET['l2'];
            $l3=$_GET['l3'];
            $l4=$_GET['l4'];
           
   
        echo"<table border><tr><td>Cadena</td><td>$cad</td></tr>
        <tr><td>Longitud</td><td>";
         if ($long == 'si') {
            $longi= strlen($cad);
            echo"$longi";
        }else{
            echo"No buscar";
        }
        "</td></tr>
        <tr><td>Letra $letra1 </td><td>";
        if ($l1 == 'si') {
            strtolower($cad);
            strtolower($letra1);
        }else{

        }
            $longi= strlen($cad);
        $n1=substr_count($cad,$letra1);
        $n11= ($n1/$longi)*100;
        echo"$n11"; 
        "</td></tr> 
        <tr><td>Letra $letra2 </td><td>";
        if ($l2 == 'si') {
            strtolower($cad);
            strtolower($letra2);
        }else{

        }
        $n2=substr_count($cad,$letra2);
        $n22= ($n2/$longi)*100;
        echo"$n22"; 
        "</td></tr> 
        <tr><td>Letra $letra3 </td><td>";
        if ($l3 == 'si') {
            strtolower($cad);
            strtolower($letra3);
        }else{

        }
        $n3=substr_count($cad,$letra3);
        $n33= ($n3/$longi)*100;
        echo"$n33"; 
        "</td></tr> 
        <tr><td>Letra $letra4 </td><td>";
        if ($l4 == 'si') {
            strtolower($cad);
            strtolower($letra4);
        }else{
            
        }
        $n4=substr_count($cad,$letra4);
        $n44= ($n4/$longi)*100;
        echo"$n44"; 
        "</td></tr> 

        </table>";

    }
    ?>
</body>
</html>