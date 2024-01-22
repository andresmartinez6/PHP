<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    session_start();

    if (isset($_SESSION["color"]) && isset($_SESSION["letra"])){
        echo "<p>El color que elegiste fue " . $_SESSION["color"] . " Y el tipo de letra es " . $_SESSION["letra"]. "</p>";
        echo "
        <style>
            body{
                background-color:$_SESSION[color] ;
            }
            p{
                font-family: $_SESSION[letra];
            }
        </style>";
    }
    echo "<a href='./ej11.2.php'><button>Volver a la página principal</button></a>";

    ?>
</body>

</html>