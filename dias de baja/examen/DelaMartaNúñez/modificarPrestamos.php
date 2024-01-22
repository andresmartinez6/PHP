<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require_once "conectar.php";
    $con = conectar();
    $consulta=$con->query("SELECT cod_socio,cod_libro, fecha_retirada,fecha_devolucion from prestamos order by fecha_retirada desc");
    echo "<table border><tr><th>cod_socio</th><th>cod_libro</th><th>fecha_retirada</th><th>fecha_devolucion</th></tr>";
    while ($fila=$consulta->fetch_array()) {    
        echo "<tr><td>$fila[cod_socio]</td><td>$fila[cod_libro]</td><td>$fila[fecha_retirada]</td>";
        if (empty($fila["fecha_devolucion"])){
            echo "<td><a href='modificarPrestamos.php?clave=$fila[cod_socio],$fila[cod_libro],$fila[fecha_retirada]'>Devolver</a></td></tr>";
        }else{
            echo "<td>$fila[fecha_devolucion]</td></tr>";
        }
        
    }   
    echo "</table>";
    if (isset($_GET["clave"])) {
        $clave=$_GET["clave"];
        $fecha = time();
        $fecha_actual = date("Y-m-d", $fecha);
        $valores=explode(",", $clave);
        var_dump($valores[0]);
        $consulta=$con->query("INSERT into prestamos values ($valores[0],$valores[1],$valores[2],$fecha_actual");
        $resul=$consulta->fetch_assoc();
        if ($consulta=$con->query("INSERT into prestamos values ($valores[0],$valores[1],$valores[2],$fecha_actual")==true) {
            echo "Se ha acabado el prestamo";
            header("refresh:3; ./modificarPrestamos.php");
        }else{
            echo "Ha habido en error en añadir la fecha de entrega del préstamo";
        }

        

    }

    ?>
</body>

</html>