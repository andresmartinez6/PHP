<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) { ?>
    <main>
        <?php require_once "funciones.php";
        $con = conectar();
        $sentencia = "select AUTO_INCREMENT from information_schema.tables where table_schema = 'inmobiliaria' and table_name='clientes'";
        $resul = $con->query($sentencia);
        if (!$resul) {
            echo "Sentencia mal escrita";
            echo "Error número  $con->errno cuya descripcion es $con->errno";
        } else {
            $datos = $resul->fetch_all(MYSQLI_ASSOC);
        }
        $resul->close();
        ?>
        <?php
        if (isset($_GET["enviar"])) {
            if (!$_GET["id"] || !$_GET["nombre"] || !$_GET["apellidos"] || !$_GET["direccion"] || !$_GET["telf1"]) {
                echo "<script> alert('No puedes dejar ningun campo vacío excepto el teléfono 2')</script>";
                header("refresh:2; url=./clientes.php");
            } else {
                if ($_GET["telf2"]) {
                    $telf2 = $_GET["telf2"];
                } else {
                    $telf2 = null;
                }
                $iddef = trim($_GET["id"]);
                $nombre = trim($_GET["nombre"]);
                $apellidos = trim($_GET["apellidos"]);
                $direccion = trim($_GET["direccion"]);
                $telf1 = trim($_GET["telf1"]);
                $telf2 = trim($_GET["telf2"]);
                $user = trim($_GET["usuario"]);
                $contra = trim(md5(md5($_GET["contra"])));

                //Comprobamos que el nombre de usuario no existe
    
                $existe = "select count(*) from clientes where nombre_usuario=?";
                $prepexiste = $con->prepare($existe);
                $prepexiste->bind_param("s", $user);
                $prepexiste->bind_result($contador);
                $prepexiste->execute();
                $prepexiste->fetch();
                $prepexiste->close();
                //$prex
                if ($contador > 0) {
                    // echo "<script> alert('Ya existe ese nombre de usuario, debes elegir otro) </script>"; no se muestra preguntar a redu 
                    echo "Ya existe ese nombre de usuario, debes elegir otro";
                } else {
                    if (
                        preg_match("/[0-9]/", $nombre) ||
                        preg_match("/[0-9]/", $apellidos) ||
                        !preg_match("/^[6-9][0-9]{8}$/", $telf1) || strlen($contra) < 6
                    ) {
                        $span = true;
                        header("refresh:1; url=./buscarclientes.php");
                    } else {
                        $insertar = "INSERT INTO clientes VALUES (null, ?,?,?,?,?,?,?)";
                        $con = conectar();
                        $preparada = $con->prepare($insertar);
                        $preparada->bind_param("sssssss", $nombre, $apellidos, $direccion, $telf1, $telf2, $user, $contra);
                        // $con->bind_result($iddef, '$nombre', '$apellidos', '$direccion', '$telf1', '$telf2'); No lo necesito
                        $preparada->execute();
                        $preparada->store_result();
                        if ($preparada->affected_rows > 0) {
                            // echo "<script> alert('El usuario $user ha sido añadido correctamente a la base de datos </script>"; No funciona
                            echo "El usuario $user ha sido añadido correctamente a la base de datos";
                            echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=./clientes.php">';
                        }
                        $preparada->close();



                    }

                }



            }
        }

        ?>
        <section id="nuevo">
            <h2>Insertar un nuevo cliente</h2>
            <form action="#" method="GET">
                <input type="text" READONLY name="id" value=<?php echo $datos[0]['AUTO_INCREMENT']; ?>> <br>
                <input type="text" name="nombre" placeholder="Nombre del cliente"><br>
                <input type="text" name="apellidos" placeholder="Apellidos"><br>
                <input type="text" name="direccion" placeholder="Escribe tu direccion"><br>
                <input type="text" name="telf1" placeholder="Escribe tu número de telefono"><br>
                <input type="text" name="telf2" placeholder="Escribe otro número de teléfono"><br>
                <input type="text" name="usuario" placeholder="Nombre de usuario"><br>
                <input type="password" name="contra" placeholder="Escribe tu contraseña"><br>
                <input type="submit" name="enviar">
            </form>
            <?php if (isset($span)) {
                echo " <script> alert('Hay un error en los datos introducidos: Los nombre y apellidos no deben incluir números. Los números de telefono deben de tener una longitud de 9 y empezar en 6 y la contraseña debe de ser mayor que 6 caractereres') </script>";
            } ?>

        </section>

    </main>

    <?php
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
require_once "funciones.php";
pintarFooter(2);
?>