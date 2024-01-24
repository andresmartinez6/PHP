
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $dia=date("D");

    switch ($dia){
        case "Mon": echo "Hoy es Lunes";
        break;
        case "Tue": echo "Hoy es Martes";
        break;
        case "Wed": echo "Hoy es Miércoles";
        break;
        case "Thu": echo "Hoy es Jueves";
        break;
        case "Fri": echo "Hoy es Viernes";
        break;
        case "Sat": echo "Hoy es Sábado";
        break;
        case "Sun": echo "Hoy es Domingo";
        break;
        default: echo "Es el día del juicio final";
    }



    ?>
</body>
</html>