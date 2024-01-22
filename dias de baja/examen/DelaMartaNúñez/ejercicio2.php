<?php
if (isset($_POST["enviar"])) {
    if (!$_POST["socio"] || !$_POST["libro"]) {
        echo "Debes rellenar todos los campos";
        header("refresh:3; ./ejercicio2.html");
    } else {
        $socio = $_POST["socio"];
        $titulo = $_POST["libro"];

        require_once "conectar.php";
        $con = conectar();

        $preparada = $con->prepare("select cod_socio, cod_libro from prestamos, socios, libros where libros.codigo = cod_libro and socios.codigo = cod_socio and nombre = ? and titulo = ?");
        $preparada->bind_param("ss", $socio, $titulo);
        $preparada->bind_result($cod_socio, $cod_libro);
        $preparada->execute();

        if ($preparada->fetch()) {
            echo "El socio y/o libro que estás intentando añadir a la base de datos no existe";
        } else {
            $consulta = "select count(*) from prestamos,libros where prestamos.cod_libro=libros.codigo and cod_socio=? and cod_libro=? and fecha_devolucion is not null";
            $existe = $con->prepare($consulta);
            $existe->bind_param("ii", $cod_socio, $cod_libro);
            $existe->execute();
            $existe->bind_result($num_filas);
            $existe->fetch();

            if (!$existe) {
                echo "Ha habido un error $con->error";
            } else {
                if ($num_filas > 0) {
                    echo "Ya existe ese préstamo, por lo que no se puede prestar";
                } else {
                    $fecha_actual = date("Y-m-d");
                    $consulta = "insert into prestamos values (?,?,?,null)";
                    $prep = $con->prepare($consulta);
                    $prep->bind_param("iis", $cod_socio, $cod_libro, $fecha_actual);
                    $prep->execute();

                    if ($prep->affected_rows > 0) {
                        echo "Datos introducidos con éxito";
                        header("refresh:3; ./ejercicio2.html");
                    } else {
                        echo "Ha habido un error al introducir los datos en la tabla $prep->error";
                    }
                }
            }
            $existe->close();
        }

        $preparada->close();
        $con->close();
    }
}
?>
