<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 3. Hacer un sitio Web que controle la fecha de último acceso del usuario. En caso de
que sea la primera vez que el usuario accede, le dará un saludo diferente que si es
usuario asiduo. Además, en caso de que no sea la primera vez que accede le deberá
mostrar la fecha y hora de último acceso -->

    <?php
        $fecha=date("Y-m-d  ", time());
        if (isset($_COOKIE["acceso"])){
            setcookie("acceso",$fecha, time()+3600,"/");
            $ultimoAcceso=$_COOKIE["acceso"];
            $ultimo_div=explode("-",$fecha);
            echo "Hola usuario Antiguo, al fecha del ultimo acceso es el $ultimo_div[2] del $ultimo_div[1] del año $ultimo_div[0]";
            $_COOKIE["acceso"]=$fecha;
        }else{
            setcookie("acceso",$fecha, time()+3600,"/");
            echo "Hola nuevo usuario nuevo, te queremos mucho!";
        }






    ?>
</body>

</html>