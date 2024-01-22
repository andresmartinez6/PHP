<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmuebles disponibles</title>
</head>

<body>
    <?php require_once "funciones.php";
    comprobarCookies();
    pintarHeader(2); 
    if (accesoUser()){?>
    <main>
        <section id="disponibles">
            
            <?php   
            $con=conectar();
            $consulta=$con->query("select id,imagen,direccion, precio from inmuebles where id_cliente is null");
            
            if ($consulta->num_rows>0){
                echo "<h2> Inmuebles disponibles para comprar </h2>";
                echo "<table border><tr><th>Foto</th><th>Dirección</th><th>Precio</th><th></th></tr>";
                while ($fila=$consulta->fetch_assoc()){
                    echo "<tr><td class='foto'><img src='../img/inmuebles/$fila[imagen]'</td><td>$fila[direccion]</td><td>$fila[precio]</td><td><a href='./vermasinfo.php?id=$fila[id]'> Ver más</a></td></tr>";
                }
                echo "</table>";
            }else{
                echo "<h2> Actualmente no hay inmuebles disponibles  </h2>";
            }
            
            $consulta->close();
            $con->close();
            
            
            ?>
        </section>
    </main>
    <?php 
    }else{
        echo "<script>alert('No tiene acceso a esta página')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
    pintarfooter(2) ?>
</body>

</html>