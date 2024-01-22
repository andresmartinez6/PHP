<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- 1. Hacer un sitio web, que al visitarlo cree las siguientes cookies:
• una cookie que tenga una vida de 2 horas.
• una cookie que tenga una vida de 3 días.
• una cookie que muera al cerrar el navegador. -->

<?php
$doshoras=60*60*2;
$tresdias=60*60*24*3;
setcookie("Cookie_2horas", "Esta cokkie dura dos horas",time()+ $doshoras);
setcookie("Cookie_3_dias", "Esta cookie 3 días ",time()+ $tresdias);
setcookie("Cookie_session","Esta cokkie se borra al cerrar el navegador",null);
echo "Cookies creadas con éxito";


?>
</body>
</html>