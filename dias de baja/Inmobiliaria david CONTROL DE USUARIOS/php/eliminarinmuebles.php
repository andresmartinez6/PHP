<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) { ?>
    <main>

        <section id="inmuebles">
            <?php
            if (isset($_GET["id_del"])) {

                $sentencia8 = "delete from  inmuebles where id = $_GET[id_del]";
                $con = conectar();
                $preparada8 = $con->query($sentencia8);
                if (!$preparada8) {
                    echo "Error en la ejecucion  de la consulta" . $con->error;
                } else {
                    echo "<script>alert ('Se ha elminado el inmueble correctamente)</script>";
                    header("Location: ./inmuebles.php");
                }
                $preparada8->close();
            }
            $con->close();
            ?>
            <a href="inmuebles.php">Volver a inmuebles</a>
        </section>
    </main>
<?php
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarfooter(2); ?>
</body>

</html>