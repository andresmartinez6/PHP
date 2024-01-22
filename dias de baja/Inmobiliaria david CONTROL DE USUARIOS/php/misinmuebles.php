<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once "funciones.php";
        comprobarCookies();
        pintarHeader(2);
    if (accesoUser()) {
        ?>
        <section id="misinmuebles">
            <?php
            echo "<h2>Lista de los inmuebles de $_SESSION[nombre]  $_SESSION[apellidos]</h2>";

            $usuario = $_SESSION["usuario"];
            $con = conectar();
            $resultado = $con->query("select inmuebles.direccion,descripcion, precio, imagen from inmuebles,clientes where inmuebles.id_cliente=clientes.id and nombre_usuario='$usuario'");
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<table border><tr><th>Imagen</th><th>Dirección</th><th>Descripción</th><th>Precio</th></tr>";
                    echo "<tr><td class='imagen'><img src='../img/inmuebles/$fila[imagen]'></td><td>$fila[direccion]</td><td>$fila[descripcion]</td><td>$fila[precio]</td></tr></table>";
                }
            } else {
                echo "<h3>Usted no tiene ningún inmueble adquirido</h3>";
            }


    }else{
        echo "<script>alert('No tiene acceso a esta página')</script>";
        echo "<script>location.href='../index.php'</script>";
    }


    ?>

    </section>



    <?php pintarFooter(2); ?>
</body>

</html>