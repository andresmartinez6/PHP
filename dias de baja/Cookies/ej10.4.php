<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="#" method="POST">
        <select name="elegida" id="">
            <option value="cookie2">Cookie de dos horas</option><br>
            <option value="cookie3">Cookie de tres dias</option><br>
            <option value="wqeqw">Cookie nueva</option><br>
            <option value="cerrar">Cookie de que se cierra al cerrar sesion</option><br>
        </select>
        <input type="submit" name="enviar" value="Enviar"><br>
    </form>

    <?php

    // 4. Ampliación del ejercicio 1: las 3 cookies se rellenarán con valores aleatorios. Una
// vez creadas, el usuario podrá elegir qué cookie quiere ver. El sitio web le mostrará el
// contenido de la cookie elegida. Si la cookie no tiene valor, le mostrará un mensaje
// acorde a dicha situación.
    
    function cookieRandom($nombre, $caducidad)
    {
        $numero_random = rand(1000, 9999);
        setcookie($nombre, $numero_random, time() + $caducidad, "/");
    }
    if (isset($_POST["enviar"])) {
        if (isset($_COOKIE[$_POST["elegida"]])) {

            $elegida = $_POST["elegida"];
            if (isset($_COOKIE[$elegida])) {
                echo "La cookie $_POST[elegida] existe";
                cookieRandom("cookie2", 2 * 60 * 60);
                cookieRandom("cookie3", 3 * 60 * 60 * 24 * 3);
                cookieRandom("cerrar", 0);
                echo $_COOKIE["elegida"];
            } else {
                echo "La cookie elegida no existe";
            }
        } else {
            setcookie("nueva", "Esta cookie es nueva ", time(), "/");
            if (isset($_COOKIE["nueva"])) {
            echo $_COOKIE["nueva"];
            }
        }
    }

    ?>
</body>

</html>