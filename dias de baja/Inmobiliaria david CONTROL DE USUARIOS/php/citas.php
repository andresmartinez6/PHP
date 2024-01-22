<?php
require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) { ?>
    <main>
        <section id="consultarmes">
            <h2>Búsqueda de citas por mes</h2>
            <form action="#" method="get">
                <input type="text" name="Dia" placeholder="Escribe el dia(1-31)">
                <input type="text" name="Mes" placeholder="Escribe el mes(1-12)">
                <input type="text" name="Año" placeholder="Escribe el año">
                <input type="submit" value="Consultar fecha" name="enviarfecha">
            </form>



        </section>

        <section id="listacitas">
            <h2>Lista de citas</h2>
            <?php
            if (isset($_GET["Mes"])) {
                $dia = 1;
                $mes = $_GET["Mes"];
                $año = $_GET["Año"];
            } else {
                $dia = date("d");
                $mes = date("m");
                $año = date("Y");
            }
            $mesanterior = $mes - 1;
            $messiguiente = $mes + 1;
            if ($mesanterior == 0) {
                $añoanterior = $año - 1;
                $mesanterior = 12;
            } else {
                $añoanterior = $año;
            }
            if ($messiguiente == 13) {
                $añosiguiente = $año + 1;
                $messiguiente = 1;
            } else {
                $añosiguiente = $año;
            }

            echo "<div class='flechas'>
            <a href=citas.php?Mes=$mesanterior&Año=$añoanterior>←</a>
            <p>$mes , $año</p>
            <a href=citas.php?Mes=$messiguiente&Año=$añosiguiente>→</a>
        </div>
        ";
            generarCalendario($dia, $mes, $año);
            $con = conectar();
            if (isset($_GET["dia_a"])) {
                echo "<h2> Lista de citas para el día $_GET[dia_a]</h2>";
                $consulta_fecha = "select citas.id , fecha, hora, motivo, lugar, nombre, telefono1 from clientes,citas where clientes.id=citas.id_cliente and fecha='$_GET[año_a]-$_GET[mes_a]-$_GET[dia_a]'";
                $preparada = $con->query($consulta_fecha);
                echo "<table border><tr> <th> Día </th> <th> Hora </th> <th> Motivo </th> <th> Lugar </th> <th>Nombre </th> <th> Teléfono</th><th> Modificar cita </th> <th> Borrar cita </th> </tr>";
                if ($preparada->num_rows > 0) {
                    while ($row = $preparada->fetch_assoc()) {
                        echo "<tr> <td> $row[fecha] </td> <td> $row[hora] </td> <td> $row[motivo] </td> <td> $row[lugar] </td> <td>$row[nombre]</td> <td>$row[telefono1] </td> <td><a href='modificarcitas.php?id_citas=$row[id]'>Modificar cita </a>  </td> <td> <a href='borrarcita.php?id_citas=$row[id]'>Borrar cita</td></a></tr>";
                    }

                } else {
                    echo "<td colspan='9' class='nocitas' >No hay citas para este día</td>";
                }
                echo "</table>";
                $preparada->close();
            }
            ?>
        </section>
        <section id="crearcita">
            <h2>Crear una nueva cita</h2>
            <?php
            $sentencia10 = "select AUTO_INCREMENT from information_schema.tables where table_schema = 'inmobiliaria' and table_name='citas'";
            $resul10 = $con->query($sentencia10);
            if (!$resul10) {
                echo "Sentencia mal escrita";
                echo "Error número  $con->errno cuya descripcion es $con->errno";
            } else {
                $datos = $resul10->fetch_all(MYSQLI_ASSOC);
            }
            ?>
            <form action="#" method="get" class="cues">
                <input type="text" readonly name="id" value=<?php echo $datos[0]['AUTO_INCREMENT']; ?>
                    placeholder="ID de la cita" hidden> <br>
                <input type="date" name="fecha" placeholder="Fecha de la cita" required> <br>
                <input type="time" name="hora" placeholder="Hora de la cita" required> <br>
                <input type="text" name="motivo" placeholder="Motivo de la cita" required> <br>
                <input type="text" name="lugar" placeholder="Lugar de la cita" required> <br>
                <?php $consulta = $con->query("select id,nombre,apellidos from clientes where id <> 0");
                echo "<select name='id_cliente' placeholder='Seleccione un cliente'>";
                echo "<option value='' disabled selected>Selecciona un cliente</option>";
                while ($fila = $consulta->fetch_assoc()) {
                    echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                }
                echo "</select>"
                    ?>

                <!-- <input type="text" name="id_cliente" placeholder="ID del cliente" required> <br> -->
                <input type="submit" name="enviarcita" value="Crear Cita">
            </form>

            <?php
            if (isset($_GET["enviarcita"])) {
                if (!$_GET["fecha"] || !$_GET["hora"] || !$_GET["motivo"] || !$_GET["lugar"] || !$_GET["id_cliente"]) {
                    echo "<script> alert('No puedes dejar ningun campo vacío excepto el teléfono 2')</script>";
                    header("refresh:2; url=./citas.php");
                } else {
                    $fecha = trim($_GET["fecha"]);
                    $hora = trim($_GET["hora"]);
                    $motivo = trim($_GET["motivo"]);
                    $lugar = trim($_GET["lugar"]);
                    $id_cliente = trim($_GET["id_cliente"]);

                    if (
                        preg_match("/[0-9]/", $motivo) &&
                        preg_match("/[0-9]/", $lugar) &&
                        !preg_match("/[0-9]/", $id_cliente)
                    ) {
                        echo "Algunos de los datos introducidos son erróneos";
                        // header("refresh:1; url=./.php");
                    } else {
                        $insertar = "insert into citas values (null,?,?,?,?,?)";
                        $preparada11 = $con->prepare($insertar);
                        $preparada11->bind_param("ssssi", $fecha, $hora, $motivo, $lugar, $id_cliente);
                        $resultado11 = $preparada11->execute();
                        if (!$resultado11) {
                            echo "Error en la inserción de datos";
                        } else {
                            echo "<script> alert('Datos introducos a la tabla citas')  </script>";
                            echo '<meta http-equiv="refresh" content="5;url="./citas.php">';
                        }
                        $preparada11->close();
                    }
                }
            }

            ?>
        </section>
        <section id="buscar">
            <h2>Buscar cita</h2>
            <form action="./buscarcita.php" method="GET">
                <input type="text" name="buscarcita">
                <input type="submit" name="enviarbuscar" value="Buscar cita">
            </form>
        </section>
    </main>
    <?php
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarFooter(2);
?>
</body>

</html>