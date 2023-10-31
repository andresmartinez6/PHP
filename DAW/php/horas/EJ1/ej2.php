<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="POST">
        Ingresa dos fechas completas<br> 
        primera fecha <input type="date" name="1"><br>
        segunda fecha <input type="date" name="2"><br>
        <input type="submit" name="enviar">
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        
  
    $primfecha= strtotime($_POST['1']);
    $segfecha= strtotime($_POST['2']);
   
    if ($primfecha>$segfecha) {
       $dif= $primfecha-$segfecha;
       $dia= $dif/86400;
       echo"$dia dias de diferencia hay entre la primera fecha y la segunda";
    
    }else{
        $dif= $segfecha-$primfecha;
        $dia= $dif/86400;
        echo"$dia dias de diferencia hay entre la primera fecha y la segunda";
    }
}
    ?>
</body>
</html>