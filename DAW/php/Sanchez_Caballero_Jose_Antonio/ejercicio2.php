<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
    if (isset($_POST['enviar'])) {
        $nom=$_POST['texto'];
        $pass=$_POST['pass'];
        if (preg_match("`[a-z]{8,}`",$nom) and (preg_match("`[0-9]{1,}[A-Z]{1,} {3,15}`"))) {
            echo"usuario correcto";
        }else{
            echo"usuario incorrecto";
            header("refresh:2;url=ejercicio2.html");
        }
    }
    ?>
</body>
</html>