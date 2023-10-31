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
        año <input type="text" name="año"><br>
        <input type="submit" name="enviar">
</form>

    <?php
    if(isset($_POST['enviar'])){
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $año = $_POST['año'];
        $nombremes= date('F',mktime(0,0,0,$mes,$dia));
        $fecha = date("$año-$mes-01");
        $nombre1dia = date("l",strtotime($fecha));
        $primdia = date()
        $ultdia = date($año-$mes-$dia, strtotime($nombre1dia));
        echo"naciste en $nombremes <br>";
        echo"El primer dia del mes en el que naciste es $nombre1dia<br>";
        echo"El mes tiene " .date('d',strtotime($ultdia)). " dias";
    }
    ?>
    
</body>
</html>