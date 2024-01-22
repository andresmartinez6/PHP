<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Inmobiliaria de David</title>
</head>

<body>
    <?php  require_once "./php/funciones.php"; comprobarCookies(); pintarHeader(1);   ?>
    
    <main>
        <h2>Inmobiliaria de David</h2>
        <section id="inicio">
            <?php
            require_once "./php/funciones.php";
            $con = conectar();
            $consulta = "SELECT imagen FROM inmuebles ORDER BY rand() LIMIT 0,1";
            $resultado = $con->query($consulta);
            echo "<div class='casa'>";
            while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
                echo "<table border><tr><td><img src ='./img/inmuebles/$fila[imagen]'></td></tr>";
            }
            echo "</table></div>";
            echo "<div class='noticias'>";
            $consulta2 = "SELECT imagen, titular, id FROM noticias WHERE fecha <= NOW() ORDER BY fecha LIMIT 0,3";
            $resultado2 = $con->query($consulta2);
            echo "<h2>Noticias </h2>";
            echo "<table border><tr><td>IMAGEN</td><td>TITULAR</td></tr>";
            while ($fila = $resultado2->fetch_array(MYSQLI_ASSOC)) {

                echo "<tr><td> <img src ='./img/noticias/$fila[imagen]'></td><td>$fila[titular]</td><td><a href='./php/noticiacompleta.php?id_noti=$fila[id]'>VER MAS</a></td></tr>";
            }

            echo "</table></div>";
            $resultado2->close();
            $con->close();

            ?>
        </section>

    </main>

    <?php pintarFooter(1) ?>