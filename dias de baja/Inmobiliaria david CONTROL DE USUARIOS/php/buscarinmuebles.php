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
    pintarHeader(2) ;
    if (accesoAdmin()){?>
    <main>
        <h2>Resultados de la búsqueda de inmuebles</h2>
        <section id="resultados">
            <?php
            if (isset($_GET["enviarbuscar"])) {
                if ($_GET["buscarinmueble"] != "") {
                    $con = conectar();
                    $inmueble = "%" . $_GET["buscarinmueble"] . "%";
                    $consulta7 = "select * from inmuebles where direccion like ? or precio like ?";
                    $preparada7 = $con->prepare($consulta7);
                    $preparada7->bind_param("ss", $inmueble, $inmueble);
                    $preparada7->bind_result($id, $direccion, $descripcion, $precio, $imagen, $id_cliente);
                    $preparada7->execute();
                    $preparada7->store_result();
                    if (!$preparada7) {
                        echo "error $preparada7->errorno: tiene un error $preparada7->error";
                    } else {
                        echo "<table border>";
                        if ($preparada7->num_rows>0) {
                            while ($preparada7->fetch()) {
                                if ($id_cliente == "") {
                                    $id_cliente = "Sin id de cliente";
                                    echo "<tr><td>$direccion</td><td>$descripcion</td><td>$precio</td><td>$imagen</td> <td>$id_cliente</td><td><a href='./inmuebles.php?id=$id'>Borrar inmueble</a></td></tr>";
                                } else {
                                    echo "<tr><td>$direccion</td><td>$descripcion</td><td>$precio</td><td>$imagen</td> <td>$id_cliente</td></tr>";
                                }
                            }
                        }else{
                            echo "No hay resultados en su búsqueda";
                        }
                    }
                    echo "</table>";
                    $preparada7->close();
                }
            }
            ?>
            <a href="./inmuebles.php" class="volver">Volver a inmuebles</a>
        </section>
    </main>
    <?php
    }else{
        echo "<script>alert('No tiene acceso a esta página')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
     pintarFooter(2) ?>
</body>

</html>