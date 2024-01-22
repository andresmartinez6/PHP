<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoUser()) { ?>
    <main>

        <section id="citas">
            <?php
            require_once "funciones.php";
            if (isset($_GET["id_citas"])) {

                $sentencia8 = "delete from citas where id = $_GET[id_citas]";
                $con = conectar();
                $preparada8 = $con->query($sentencia8);
                if (!$preparada8) {
                    echo "Error en la ejecucion  de la consulta" . $con->error;
                } else {
                    echo "<script>alert ('Se ha eliminado la cita correctamente)</script>";
                    header("Location: ./citas.php");
                }
                $preparada8->close();
                $con->close();
            }
            ?>
        </section>
    </main>
<?php
}else{
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarfooter(2); ?>
</body>

</html>