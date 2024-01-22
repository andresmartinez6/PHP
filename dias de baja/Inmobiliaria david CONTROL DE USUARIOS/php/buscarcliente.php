<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) { ?>
    <main>
        <section>
            <?php
            $con = conectar();
            if (isset($_GET["enviarbuscar"])) {
                if ($_GET["buscarcliente"] != "") {
                    $cliente = "%" . $_GET["buscarcliente"] . "%";
                    $consulta3 = "select id,nombre,apellidos,direccion,telefono1,telefono2,nombre_usuario from clientes where nombre like ? or apellidos like ? or telefono1 like ? or telefono2 like ?";
                    $preparada2 = $con->prepare($consulta3);
                    $preparada2->bind_param("ssss", $cliente, $cliente, $cliente, $cliente);
                    $preparada2->bind_result($id, $nombre, $apellidos, $direccion, $telf1, $telf2, $user);
                    $preparada2->execute();
                    $preparada2->store_result();
                    if (!$preparada2) {
                        echo "error $preparada2->errorno: tiene un error $preparada2->error";
                    } else {
                        echo "<table border>";
                        if ($preparada2->num_rows > 0) {
                            while ($preparada2->fetch()) {
                                if ($user == "") {
                                    echo "<tr><td>$id</td><td>$nombre</td><td>$apellidos</td><td>Dirección</td><td>$telf1</td> <td>$telf2</td><td>Sin nombre de usuario</td></tr>";
                                } else {
                                    echo "<tr><td>$id</td><td>$nombre</td><td>$apellidos</td><td>Dirección</td><td>$telf1</td> <td>$telf2</td><td>$user</td></tr>";
                                }
                            }
                        } else {
                            echo "<script>alert('No se han encontrado resultados')</script>";
                            echo "<script>location.href='./clientes.php'</script>";
                        }

                    }
                    echo "</table>";
                    $preparada2->close();
                }
            }
            $con->close();
            ?>
            <a href="./clientes.php">Volver a clientes</a>
        </section>
    </main>

    <?php
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarFooter(2);
?>