<!-- 2. Crear un sitio Web que contenga 4 páginas. En la primera aparecerá un
formulario donde el usuario pueda elegir el color que quiere de fondo para su
visita y el tipo de letra que quiere ver. Se creará una sesión y se guardarán dichos
datos en ella. Durante el tiempo que la sesión permanezca abierta, el entorno
deberá mostrarse tal como el usuario eligió. En todas las páginas debe haber un
enlace que permita ir a la primera página y cambiar dicho entorno. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="POST">
        <input type="color" name="color">
        <input type="text" name="letra" placeholder="Escribe el tipo de de letra">
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    if (isset($_POST["enviar"])) {
        session_start();

        $_SESSION["color"] = $_POST["color"];
        $_SESSION["letra"] = $_POST["letra"];
    }







    ?>
</body>

</html>