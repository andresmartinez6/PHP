<?php require_once "funciones.php"; comprobarCookies(); pintarHeader(2);
if (accesoUser()){?>
<main>

    <section id="inmuebles">
        <?php
        require_once "funciones.php";
        if (isset($_GET["id_mos"])) {

            $sentencia8 = "select * from inmuebles where id = $_GET[id_mos]";
            $con=conectar();
            $preparada8 = $con->query($sentencia8);
            if ( !$preparada8) {
                echo "Error en la ejecucion  de la consulta" . $con->error;
            } else {
                echo "<h2> Informacion completa inmueble</h2>";
                echo "<table border>";
                echo "<tr><th>Imagen</th><th>Dirección<th>Descripcion</th><th>Precio</th><th>Id</th><th>Id cliente</th></tr>";
                if ($preparada8->num_rows > 0) {
                    while ($fila_d = $preparada8->fetch_assoc()) {
                        echo "<tr><td><img src='../img/inmuebles/$fila_d[imagen]'></td><td>$fila_d[direccion]</td><td>$fila_d[descripcion]</td><td>$fila_d[precio]</td><td>$fila_d[id]</td><td>$fila_d[id_cliente]</td></tr>";
                    }
                    
                } else {
                    echo "<tr><td colspan='7'>No hay inmuebles disponibles</td></tr>";
                }
                echo "</table>";
                $preparada8->close();
            }
        }
        $con->close();
        ?>
        <a href="inmuebles.php">Volver a inmuebles</a>
        
    </section>
</main>
<?php
}else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarfooter(2);   ?>
</body>

</html>