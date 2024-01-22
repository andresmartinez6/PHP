<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) {
    if (isset($_GET["enviarbuscar"])) {
        if ($_GET["buscarcita"] != "") {
            $con = conectar();
            $cita = "%" . $_GET["buscarcita"] . "%";
            $consulta12 = "select citas.id , fecha, hora, motivo, lugar, nombre, telefono1 from clientes,citas where clientes.id=citas.id_cliente and (nombre like ? or fecha like ?)";
            $preparada12 = $con->prepare($consulta12);
            $preparada12->bind_param("ss", $cita, $cita);
            $preparada12->bind_result($id, $fecha, $hora, $motivo, $lugar, $nombre, $telf);
            $preparada12->execute();
            $preparada12->store_result();
            echo $preparada12->num_rows;
            if (!$preparada12) {
                echo "error $con->errno: tiene un error $con->error";
            } else {
                if ($preparada12->num_rows > 0) {
                    echo "<table border><tr> <th> Día </th> <th> Hora </th> <th> Motivo </th> <th> Lugar </th> <th>Nombre </th> <th> Teléfono</th><th> Modificar cita </th> <th> Borrar cita </th> </tr>";
                    while ($preparada12->fetch()) {
                        echo "<tr> <td> $id </td> <td> $fecha </td> <td> $hora </td> <td> $motivo </td> <td>$lugar</td> <td>$nombre </td> <td><a href='modificarcitas.php?id_citas=$id'>Modificar cita </a></td> <td> <a href='borrarcita.php?id_citas=$id'>Borrar cita</td></tr>";
                    }
                }else{
                    echo "<script>alert('No se han encontrado citas en tu búsqueda')</script>";
                    echo "<script>location.href='./citas.php'</script>";
                }

            }
            echo "</table>";
            echo "<a href='./citas.php'>Volver a citas</a>";
            $preparada12->close();
        }
    }
    $con->close();
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarfooter(2); ?>
</body>

</html>