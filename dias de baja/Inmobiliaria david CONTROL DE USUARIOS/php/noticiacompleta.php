<?php require_once "./funciones.php"; pintarHeader(2) ?>
<main>

    <section id="inmuebles">
        <?php
        require_once "funciones.php";
        if (isset($_GET["id_noti"])) {

            $sentencia8 = "select * from noticias where id = $_GET[id_noti]";
            $con=conectar();
            $preparada8 = $con->query($sentencia8);
            if ( !$preparada8) {
                echo "Error en la ejecucion  de la consulta" . $con->error;
            } else {
                echo "<h2> Informacion completa de la noticia</h2>";
                echo "<table border>";
                echo "<tr><th>Imagen</th><th>Id</th><th>Titular<th>Contenido</th><th>fecha</th></tr>";
                if ($preparada8->num_rows > 0) {
                    while ($fila_d = $preparada8->fetch_assoc()) {
                        echo "<tr><td><img src='../img/noticias/$fila_d[imagen]'></td><td>$fila_d[id]</td><td>$fila_d[titular]</td><td>$fila_d[contenido]</td><td>$fila_d[fecha]</td></tr>";
                    }
                    $preparada8->close();
                } else {
                    echo "<tr><td colspan='7'>No hay inmuebles disponibles</td></tr>";
                }
                echo "</table>";
            }
            $con->close();
        }

        ?>
        <a href="../index.php">Volver al inicio</a>
    </section>
</main>
<?php pintarFooter(2);  ?>

</body>

</html>