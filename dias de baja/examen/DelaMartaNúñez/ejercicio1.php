<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["enviar"])) {
        if (!$_POST["nombre"]) {
            echo "Debes introducir todos los datos";
            header("refresh:3; ./ejercicio1.html");
        }
        $prestamo_cont = 0;
        require_once "conectar.php";
        $con = conectar();

        $consulta = "SELECT socios.nombre,libros.titulo, fecha_retirada, fecha_devolucion from socios,prestamos,libros where prestamos.cod_socio=socios.codigo and libros.codigo=cod_libro and autor like ? and fecha_devolucion is not null";

        $prepa = $con->prepare($consulta);
        $au = $_POST["nombre"];
        $autor = "%" . $_POST["nombre"] . "%";
        $prepa->bind_param("s", $autor);
        $prepa->bind_result($nombre, $titulo, $retirada, $devolucion);
        $prepa->execute();
        $prepa->store_result();

        $compro = "select count(*) from prestamos,libros where prestamos.cod_libro=libros.codigo and titulo='$titulo'";
        $consulta = $con->query($compro);
        $consulta->fetch_assoc();
        $media = 0;
        $total_dias = 0;
        // $fecha=2023-11-27;
        setlocale(LC_ALL, "es-ES.UTF-8");
        $fecha = mktime(0, 0, 0, 11, 27, 2023);
        $dia = strftime("%d", $fecha);
        $mes = strftime("%B", $fecha);
        $año = strftime("%Y", $fecha);

        echo "Los libros prestados  de $au, a dia $dia  de $mes de $año son: ";
        if ($consulta->num_rows > 0) {
            echo "<table border><tr><th>Prestamo</th><th>Socio</th><th>Libro</th><th>Días</th></tr>";
            while ($prepa->fetch()) {
                $tiempo = (round((strtotime($devolucion) - strtotime($retirada)) / 60 / 60 / 24));
                echo "<tr><td>Prestamo $prestamo_cont</td><td>$nombre</td><td>$titulo</td><td>$tiempo</td></tr>";
                $total_dias += $tiempo;
                $prestamo_cont++;
            }
            $media = $total_dias / $prestamo_cont;
            echo "<td>Cantidad media: </td> <td> </td><td> </td><td> $media</td>";
            echo "</table>";

        }
        $prepa->close();
    } else {
        echo "No hay prestamos";
    }
    $con->close();
    ?>
</body>

</html>