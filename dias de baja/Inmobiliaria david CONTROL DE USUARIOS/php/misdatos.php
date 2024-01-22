<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2); 
if (accesoUser()){
    ?>

<main>

    <section id="misdatos">

        <h2>Datos personales de
            <?php echo $_SESSION["nombre"] ?>
        </h2>
        <form action="#" method="POST">
            <?php $con = conectar();
            $id = $_SESSION["id"];
            $consulta = $con->query("select nombre,apellidos,direccion,telefono1,telefono2,nombre_usuario,pass from clientes where id=$id");
            $fila = $consulta->fetch_assoc();
            $old=$fila["pass"];
            echo "<input type='text' name='nombre' value='$fila[nombre]' readonly> <br>";
            echo "<input type='text' name='apellidos' value='$fila[apellidos]' readonly><br>";
            echo "<input type='text' name='direccion' value='$fila[direccion]'><br>";
            echo "<input type='text' name='telefono1' value='$fila[telefono1]'><br>";
            echo "<input type='text' name='telefono2' value='$fila[telefono2]' placeholder='Escribe otro numero de telefono si quieres'><br>";
            echo "<input type='text' name='nombre_usuario' value='$fila[nombre_usuario]' readonly><br>";
            echo "<p>Si quieres cambiar la contraseña  pon al antigua y la nueva</p>";
            echo "<input type='password' name='contraseña_anterior' placeholder='Escribe tu contraseña anterior'><br>";
            echo "<input type='password' name='contraseña_nueva' placeholder='Nueva contraseña'><br>";
            echo "<input type='submit' name='enviar'<br>";
            ?>
        </form>
    </section>
    <?php
    if (isset($_POST["enviar"])) {
        $nombre = trim($_POST["nombre"]);
        $apellidos = trim($_POST["apellidos"]);
        $direccion = trim($_POST["direccion"]);
        $telefono1 = trim($_POST["telefono1"]);
        $telefono2 = trim($_POST["telefono2"]);
        $nombre_usuario = trim($_POST["nombre_usuario"]);
        $antigua = $old;
        $nueva = md5(md5($_POST["contraseña_nueva"]));

        if (!empty($_POST["contraseña_nueva"]) && !empty($_POST["contraseña_anterior"])) {

            if ((md5(md5($_POST["contraseña_anterior"])) == $antigua) && strlen($_POST["contraseña_nueva"]) > 6) {
                if (preg_match("/^[6-9][0-9]{8}$/", $telefono1)) {
                    $consulta = $con->prepare("UPDATE clientes set direccion=?,telefono1=?,telefono2=?,pass=? where id=?");
                    $consulta->bind_param("ssssi", $direccion, $telefono1, $telefono2, $nueva, $id);
                    $consulta->execute();
                    
                    $consulta->store_result();
                    var_dump($consulta);
                    if ($consulta->affected_rows > 0) {
                        echo "<script>alert('Datos actualizados correctamente!')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=./misdatos.php'>";
                    } else {
                        echo "<script>alert('Ha habido algun error introduciendo los datos')</script>";
                    }
                } else {
                    echo "<script>alert('Algunos de los datos introducidos son incorrectos')</script>";
                }
            } else {
                echo "<script>alert('La contraseña antigua introducida es incorrecta o la nueva es menor a 6 caracteres')</script>";
            }

        } else {
            if (preg_match("/^[6-9][0-9]{8}$/", $telefono1)) {
                $consulta = $con->prepare("UPDATE clientes set direccion=?,telefono1=?,telefono2=? where id=?");
                $consulta->bind_param("sssi", $direccion, $telefono1, $telefono2, $id);
                $consulta->execute();
                $consulta->store_result();
                if ($consulta->affected_rows > 0) {
                    echo "<script>alert('Datos actualizados correctamente!')</script>";
                    // echo "Datos actualizados!";
                    // echo "<meta http-equiv='refresh' content='0;url=http://wwww.google.es>";
                    // header ("Location:miscitas.php");
                    echo "<script>location.href='misdatos.php'</script>";
                    exit();
                } else {
                    echo "<script>alert('Ha habido algun error introduciendo los datos')</script>";
                }
            }else{
                echo "<script>alert('El número de telefono principal inintroducido es incorrecto')</script>";
            }
        }
        $consulta->close();
        $con->close();
    }
}else{
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
    ?>
</main>
<?php pintarFooter(2); ?>
</body>

</html>