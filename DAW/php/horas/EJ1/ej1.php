<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        Ingresa tu fecha de nacimiento<br> 
        dia <input type="text" name="dia"><br>
        mes <input type="text" name="mes"><br>
        anio <input type="text" name="anio"><br>
        <input type="submit" name="enviar">
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        $dia=strtotime("$_POST[dia]-$_POST[mes]-$_POST[anio]");
        $nombredia= date("l",$dia);
        echo"naciste un $nombredia";
        
    }
    ?>
</body>
</html>