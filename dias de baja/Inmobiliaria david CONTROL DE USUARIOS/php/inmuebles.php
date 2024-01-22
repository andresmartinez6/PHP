<?php require_once "funciones.php"; comprobarCookies(); pintarHeader(2); 
if (accesoAdmin()){?>
<main>
    <?php
    $con = conectar();
    $sentencia5 = "select AUTO_INCREMENT from information_schema.tables where table_schema = 'inmobiliaria' and table_name='inmuebles'";
    $resul5 = $con->query($sentencia5);
    if (!$resul5) {
        echo "Sentencia mal escrita";
        echo "Error : $con->errno, que significa $con->error";
    } else {
        $datos5 = $resul5->fetch_all(MYSQLI_ASSOC);
    }
    ?>
    <section id="nuevo">
        <h2>Insertar un nuevo inmueble</h2>
        <form action="#" method="POST" enctype='multipart/form-data'>
            <input type="text" hidden name="id" value=<?php echo $datos5[0]['AUTO_INCREMENT']; ?>> <br>
            <input type="text" name="direccion" required placeholder="Direccion del inmueble"><br>
            <input type="text" name="descripcion" required placeholder="Descripcion del inmueble"><br>
            <input type="text" name="precio" required placeholder="Precio del inmueble"><br>
            <input type="file" name="imagen"><br>
            <input type="submit" name="enviar">
        </form>
    </section>
    <?php
    if (isset($_POST["enviar"])) {
        // if (!preg_match("`[A-Za-z]`", $_POST[""]))
        $sentencia6 = "insert into inmuebles values (null,?,?,?,?,null)";
        $preparada6 = $con->prepare($sentencia6);
        $direccion = trim($_POST["direccion"]);
        $descripcion = trim($_POST["descripcion"]);
        $precio = trim($_POST["precio"]);
        $imagen_nombre = $_FILES["imagen"]["name"];
        if (!file_exists("../img")) {
            mkdir("../img");
        }
        if (!file_exists("../img/inmuebles/")) {
            mkdir("../img/inmuebles/");
        }
        if ($_FILES["imagen"]["type"] == "image/jpeg") {
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/inmuebles/$imagen_nombre");
        } elseif ($_FILES["imagen"]["type"] == "image/png") {
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/inmuebles/$imagen_nombre");
        } elseif ($_FILES["imagen"]["type"] == "image/gif") {
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/inmuebles/$imagen_nombre");
        } else {
            echo "<script> alert('El formato del archivo no es compatible con la aplicación')</script>";
        }
        $preparada6->bind_param("ssss", $direccion, $descripcion, $precio, $imagen_nombre);
        $preparada6->execute();
        if ($preparada6->errno) {
            die("Error en la ejecución de la consulta: " . $preparada6->error);
        } else {
            echo "<script>alert('Se ha añadido el inmueble correctamente')</script>";
            echo "<script>location.href='inmuebles.php'</script>";
        }
        $preparada6->close();
    }
    ?>
    <section id="buscar">
        <h2>Buscar inmueble</h2>
        <form action="buscarinmuebles.php" method="GET">
            <input type="text" name="buscarinmueble">
            <input type="submit" name="enviarbuscar">
        </form>
        <?php
       
        if (isset($_GET["id"])) {
            $borrar = "delete from inmuebles where id=?";
            $preparadaborrar = $con->prepare($borrar);
            $preparadaborrar->bind_param("i", $_GET["id"]);
            $preparadaborrar->execute();
            echo "<script> alert('Se ha eliminado del inmueble con id=$_GET[id] correctamente')</script>";
            $preparadaborrar->close();
        }
        ?>
    </section>

    <section id="inmuebles">
        <?php
        $sentencia8 = "select inmuebles.id,inmuebles.direccion,imagen,nombre from inmuebles,clientes where clientes.id=inmuebles.id_cliente";
        $sentencia_disp = "select id,inmuebles.direccion,imagen from inmuebles where id_cliente is null";
        $prep_dis = $con->query($sentencia_disp);
        $preparada8 = $con->query($sentencia8);

        if (!$prep_dis || !$preparada8) {
            echo "Error en la ejecucion  de la consulta" . $con->error;
        } else {
            echo "<h2> Listado de inmuebles</h2>";
            echo "<table border>";
            echo "<tr><th>Imagen</th><th>Dirección<th>Cliente</th><th>Disponibilidad</th><th>Modificar Inmueble</th><th>Eliminar Inmueble</th></tr>";
            if ($prep_dis->num_rows > 0) {
                while ($fila_d = $prep_dis->fetch_assoc()) {
                    echo "<tr><td><a href='mostrarinmueble.php?id_mos=$fila_d[id]'><img src='../img/inmuebles/$fila_d[imagen]'></a></td><td>$fila_d[direccion]</td><td></td><td>Disponible</td><td><a href='modificarinmueble.php?id_mod=$fila_d[id]'>Modificar</a></td><td><a href='eliminarinmuebles.php?id_del=$fila_d[id]'>Eliminar</a></td></tr>";
                }
                $prep_dis->close();
            } else {
                echo "<tr><td colspan='7'>No hay inmuebles disponibles</td></tr>";
            }
            if ($preparada8->num_rows > 0) {
                while ($fila = $preparada8->fetch_assoc()) {
                    echo "<tr><td><img src='../img/inmuebles/$fila[imagen]'></td><td>$fila[direccion]</td><td>$fila[nombre]</td><td>No disponible</td><td>No modificable</td><td><a href='eliminarinmuebles.php?id_del=$fila[id]'>Eliminar</a></td></tr>";
                }
                // no consigo que se muestren los inmuebles
                $preparada8->close();
            } else {
                echo "<tr><td colspan='7'>No hay inmuebles con clientes comprados</td></tr>";
            }
            echo "</table>";
        }
        $con->close();
        ?>
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