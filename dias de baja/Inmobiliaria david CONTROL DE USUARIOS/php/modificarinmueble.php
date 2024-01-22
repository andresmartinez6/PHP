<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) {


    $con = conectar();
    $query = $con->query("select direccion from inmuebles where id=$_GET[id_mod]");
    if ($query) {
        $fila = $query->fetch_assoc();
        if ($fila) {
            $direccion = $fila['direccion'];
        }
    }

    ?>

    <body>

        <main>
            <h2>Añadir inmueble como vendido</h2>
            <form action="#" method="POST">
                <input type="text" name="direccion" readonly
                    value="<?php echo "Inmueble con dirección : " . $direccion ?>"><br>
                <input type="text" name="id_inmu" readonly value="<?php echo "$_GET[id_mod]" ?>" hidden><br>
                <select name='id_cliente' class='comprador'>
                    <?php $consulta = $con->query("select nombre, apellidos, id from clientes where id <> 0");
                    while ($fila = $consulta->fetch_assoc()) {
                        echo "<option value=$fila[id]>$fila[nombre] $fila[apellidos]</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="enviarañadir" value="Añadir cliente"><br>
            </form>

            <?php

            if (isset($_POST["enviarañadir"])) {


                $cliente = trim($_POST['id_cliente']);
                $inmueble = trim($_POST['id_inmu']);
                if (preg_match("/[0-9]/", $cliente)) {
                    $sentencia = "UPDATE inmuebles SET id_cliente=? WHERE id='$inmueble'";
                    $consulta = $con->prepare($sentencia);
                    $consulta->bind_param("i", $cliente);
                    $consulta->execute();
                    $consulta->store_result();
                    $consulta->close();
                    if (!$consulta) {
                        echo "Error " . $con->errno . ": tiene un error " . $con->error;
                    } else {
                        echo "Se ha añadido el cliente $_POST[id_cliente] al inmueble correctamente";
                        header("refresh:3;inmuebles.php");
                    }
                } else {
                    echo "No has metido un dato correcto";
                    header("refresh:3;modificarinmueble.php?id_mod=$inmueble");
                }
                $query->close();
                $con->close();
            }
            ?>
        </main>
    <?php
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarFooter(2) ?>
</body>

</html>