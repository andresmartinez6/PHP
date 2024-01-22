<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  require_once "funciones.php"; comprobarCookies(); pintarHeader(2);  
    if (accesoUser()){?>
    </section>

    <section id="listacitas">
        <h2>Mis citas</h2>
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
            <a href=miscitas.php?Mes=$mesanterior&Año=$añoanterior>←</a>
            <p>$mes , $año</p>
            <a href=miscitas.php?Mes=$messiguiente&Año=$añosiguiente>→</a>
        </div>
        ";
        $id=$_SESSION["id"];
        generarCalendarioUsuario($dia, $mes, $año, $id);

        if (isset($_GET["dia_a"])) {
            echo "<h2> Lista de citas para el día $_GET[dia_a] del mes $_GET[mes_a]</h2>";
            $fecha = "select citas.id , fecha, hora, motivo, lugar, nombre, telefono1 from clientes,citas where clientes.id=citas.id_cliente and fecha='$_GET[año_a]-$_GET[mes_a]-$_GET[dia_a]' and id_cliente=$_SESSION[id]";
            $con=conectar();
            $consulta = $con->query($fecha);
            echo "<table border><tr> <th> Día </th> <th> Hora </th> <th> Motivo </th> <th> Lugar </th> <th>Nombre </th> <th> Teléfono</th> </tr>";
            if ($consulta->num_rows > 0) {
                while ($row = $consulta->fetch_assoc()) {
                    echo "<tr> <td> $row[fecha] </td> <td> $row[hora] </td> <td> $row[motivo] </td> <td> $row[lugar] </td> <td>$row[nombre]</td> <td>$row[telefono1] </td> </tr>";
                }
                
            } else {
                echo "<td colspan='9' class='nocitas' >No hay citas para este día</td>";
            }
            echo "</table>";
            $consulta->close();
            $con->close();
        }
    }else{
        echo "<script>alert('No tiene acceso a esta página')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
        ?>
    </section>


    <?php  pintarFooter(2)  ?>
</body>
</html>