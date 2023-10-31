<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $cad1= $_POST['t1'];
        $cad2= $_POST['t2'];
        $cad3= $_POST['t3'];
        $cad4= $_POST['t4'];
        $cad5= $_POST['t5'];

       echo"<table border><tr>
       <td>CADENA</td><td>CATEGORIA</td></tr><tr>
       <td>$cad1</td><td>";
       
       if(preg_match('/^$/',$cad1)){
            echo"Categoria 1=> Cadena vacía";

       }elseif (preg_match('/^[A-Za-z]+$/',$cad1)) {
            echo"Categoria 2=> Cadena con una unica palabra";

       }elseif (preg_match('/^[A-Za-z]+[A-Za-z]+$/',$cad1)) {
            echo"Categoria 3=> Cadena con dos palabras";

       }elseif (preg_match('/^[0-9]+$/',$cad1)) {
            echo"Categoria 4=> Cadena con un unico numero";

       }elseif (preg_match('/^\d*[02468]$/',$cad1)) {
            echo"Categoria 5=> Cadena con un unico numero par";

       }elseif (preg_match('/^[6-9]\d{8}$/',$cad1)) {
            echo"Categoria 6=> Numero de telefono";
       }
       
       
    echo"</td>";

        echo"</tr></table>";
         
    ?>
</body>
</html>