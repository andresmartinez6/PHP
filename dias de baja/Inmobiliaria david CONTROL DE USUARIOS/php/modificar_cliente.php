<?php require_once "funciones.php";
comprobarCookies();
pintarHeader(2);
if (accesoAdmin()) { ?>
    <main>
        <?php
        if (isset($_GET['id'])) {
            $con = conectar();
            $id_cliente = $_GET['id'];
            // print_r($id_cliente);
            $datos = "select id,nombre,apellidos,direccion,telefono1,telefono2,nombre_usuario from clientes where id=?";
            $consulta = $con->prepare($datos);
            $consulta->bind_param("i", $id_cliente);
            $consulta->bind_result($id, $nombre, $apellidos, $direccion, $telf1, $telf2, $user);
            $consulta->execute();

            while ($consulta->fetch()) {
                echo "<section id='nuevo'>
                <h2>Modificar cliente</h2>
                <form action='#' method='POST'>
                    <input type='text' DISABLED name='id' value='$id'> <br>
                    <input type='hidden' name='$id'>
                    <input type='text' name='nombre' value='$nombre'><br>
                    <input type='text' name='apellidos' value='$apellidos'><br>
                    <input type='text' name='direccion' value='$direccion'><br>
                    <input type='text' name='telf1' value='$telf1'><br>
                    <input type='text' name='telf2' value='$telf2'><br>
                    <input type='text' name='usuario' value='$user'><br>
                    <input type='password' name='contraseña'><br>
                    <input type='submit' name='enviar'>
                </form>";
            }
            ;
            $consulta->close();
            if (isset($_POST["enviar"])) {
                if (!$_GET["id"] || !$_POST["nombre"] || !$_POST["apellidos"] || !$_POST["direccion"] || !$_POST["telf1"] || !$_POST["usuario"] || !$_POST["contraseña"]) {
                    echo "<script> alert('No puedes dejar ningun campo vacío excepto el teléfono 2')</script>";
                    header("refresh:2; url=./clientes.php");
                } else {
                    $existe = "select count(*) from clientes where nombre_usuario=?";
                    $usuario = trim($_POST["usuario"]);
                    $prepexiste = $con->prepare($existe);
                    $prepexiste->bind_param("s", $usuario);
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
                            preg_match("/[0-9]/", $_POST["nombre"]) ||
                            preg_match("/[0-9]/", $_POST["apellidos"]) ||
                            !preg_match("/^[6-9][0-9]{8}$/", $_POST["telf1"]) || strlen($_POST["contraseña"]) < 6
                        ) {
                            echo "<script> alert('Error: Algunos de los datos introducidos son incorrectos, la contraseña debe de ser de una longitud mayor o igual que 6')</script>";
                            header("refresh:1; url=./modificar_cliente.php?id=$_GET[id]");
                        } else {
                            if ($_POST["telf2"]) {
                                $telf2 = $_POST["telf2"];
                            } else {
                                $telf2 = null;
                            }
                            $id = trim($_GET["id"]);
                            $nombre = trim($_POST["nombre"]);
                            $apellidos = trim($_POST["apellidos"]);
                            $direccion = trim($_POST["direccion"]);
                            $telf1 = trim($_POST["telf1"]);
                            $telf2 = trim($_POST["telf2"]);
                            $contraseña = md5($_POST["contraseña"]);
                            if ($telf2 == "") {
                                $consulta2 = "update clientes set nombre= ?, apellidos = ?, direccion=?, telefono1= ?, telefono2= null , nombre_usuario=?, pass=? where id= ?";
                                $preparado = $con->prepare($consulta2);
                                echo "$con->error";
                                $preparado->bind_param("ssssssi", $nombre, $apellidos, $direccion, $telf1, $usuario, $contraseña, $id);
                            } else {
                                $consulta2 = "update clientes set nombre= ?, apellidos = ?, direccion=?, telefono1= ?, telefono2= null , nombre_usuario=?,pass=? where id= ?";
                                $preparado = $con->prepare($consulta2);
                                $preparado->bind_param("sssssssi", $nombre, $apellidos, $direccion, $telf1, $telf2, $usuario, $contraseña, $id);
                            }
                            $preparado->execute();
                            $preparado->store_result();
                            if ($preparado->affected_rows > 0) {
                                echo " <script> alert('Nombre cambiado correctamente') </script>";
                                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./clientes.php">';
                            }
                            $preparado->close();
                        }
                    }

                }
            }
            $con->close();
        }

        ?>


        <?php if (isset($span)) {
            echo " <script> alert('Hay un error en los datos introducidos') </script>";
        } ?>

        </section>
    </main>

<?php
} else {
    echo "<script>alert('No tiene acceso a esta página')</script>";
    echo "<script>location.href='../index.php'</script>";
}
pintarFooter(2) ?>