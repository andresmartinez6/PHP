<?php require_once "funciones.php"; comprobarCookies(); pintarHeader(2);
if (accesoAdmin()){ ?>
    <main>
        <?php require_once "funciones.php";
        $con = conectar();
        $sentencia = "select AUTO_INCREMENT from information_schema.tables where table_schema = 'inmobiliaria' and table_name='clientes'";
        $resul = $con->query($sentencia);
        if (!$resul) {
            echo "Sentencia mal escrita";
            echo "Error número  $con->errno cuya descripcion es $con->errno";
        } else {
            $datos = $resul->fetch_all(MYSQLI_ASSOC);
        }
        $resul->close();
        ?>
        <section id="clientes">
            <h2>Tabla clientes</h2>
            <?php
            $con = conectar();
            $sentecia2 = "select id,nombre,apellidos,direccion,telefono1,telefono2,nombre_usuario from clientes where id <> 0";
            $datosTabla = $con->query($sentecia2);
            echo "<table border><tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Teléfono 1</th><th>Teléfono 2</th> <th>Nombre de Usuario</th></tr>";
            while ($fila = $datosTabla->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr><td>$fila[id]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[direccion]</td><td>$fila[telefono1]</td> <td>$fila[telefono2]</td><td>$fila[nombre_usuario]</td><td><a href='modificar_cliente.php?id=$fila[id]'>Modificar</a> </td></tr>";
            }
            echo "</table>";
            $datosTabla->close();
            ?>
        </section>
        <section id="nuevo">
        <a href="./insertarcliente.php">Insertar un nuevo cliente</a>

        </section>
        
        <section id="buscar">
            <h2>Buscar cliente</h2>
            <form action="./buscarcliente.php" method="GET">
                <input type="text" name="buscarcliente">
                <input type="submit" name="enviarbuscar">
            </form>
        </section>
    </main>

<?php
}else{
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
    require_once "funciones.php";
    pintarFooter(2);
?>