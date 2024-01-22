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
    if (accesoUser()){

    
    ?>

    <main>
        <section id="vermas">
            <?php
            $id = $_GET["id"];
            $con = conectar();
            $consulta = $con->query("select direccion, descripcion, precio, imagen from inmuebles where id=$id");
            while ($fila = $consulta->fetch_assoc()) {
                echo "<h2> Inmueble en la dirección : $fila[direccion]</h2>";
                echo "<div><img src='../img/inmuebles/$fila[imagen]'>";
                echo "<div><p> $fila[descripcion]</p>";
                echo "<span> $fila[precio] €</span></div></div>";
            }
            ?>
            <a href="./inmueblesdisponibles.php">Volver atrás</a>
        </section>
    </main>
    <?php 
}else{
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarFooter(2); ?>
</body>

</html>