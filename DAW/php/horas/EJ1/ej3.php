<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="POST">
    
        Ingresa tu dia de nacimiento <input type="text" name="dia"><br>
        Ingresa tu mes de nacimiento <input type="text" name="mes"><br>
        Ingresa tu año de nacimiento <input type="text" name="año"><br>
        <input type="submit" name="enviar">
    </form>

    <?php
    if(isset($_POST['enviar'])){
        $dia= $_POST['dia'];
        $mes= $_POST['mes'];
        $año= $_POST['año'];
    }
    ?>
    
</body>
</html>