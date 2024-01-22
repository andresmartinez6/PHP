<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php  require_once "funciones.php"; comprobarCookies(); pintarHeader(2); 
    if (accesoAdmin()){ ?>

    <main>
        <?php 
        if (isset($_GET['id_citas'])) {
            $con = conectar();
            $id_citas = $_GET['id_citas'];
            $datos = "select * from citas where id=?";
            $consulta = $con->prepare($datos);
            $consulta->bind_param("i", $id_citas);
            $consulta->bind_result($id_citas, $fecha, $hora, $motivo, $lugar, $id_cliente);
            $consulta->execute();

            while ($consulta->fetch()) {
        ?>
                <section id='nuevo'>
                    <h2>Modificar cita</h2>
                    <form action='' method='GET'>
                        <input type='text' READONLY name='id' value='<?php echo $id_citas; ?>'> <br>
                        <input type='hidden' name='id_citas' value='<?php echo $id_citas; ?>'>
                        <input type='date' name='fecha' value='<?php echo $fecha; ?>'><br>
                        <input type='time' name='hora' value='<?php echo $hora; ?>'><br>
                        <input type='text' name='motivo' value='<?php echo $motivo; ?>'><br>
                        <input type='text' name='lugar' value='<?php echo $lugar; ?>'><br>
                        <input type='text' name='id_cliente' value='<?php echo $id_cliente; ?>'><br>
                        <input type='submit' name='enviar'>
                    </form>
                </section>
        <?php
            }
            $consulta->close();
            if (isset($_GET["enviar"])) {
                if (!$_GET["id_citas"] || !$_GET["fecha"] || !$_GET["hora"] || !$_GET["motivo"] || !$_GET["lugar"] || !$_GET["id_cliente"]) {
                    echo "<script> alert('Algun campo esta vacio o el ID del cliente no existe')</script>";
                    // header("location:./modificarcitas.php?id_citas=$id_citas");
                    exit;
                } else {
                    if (
                        preg_match("/[0-9]/", trim($_GET["motivo"])) &&
                        preg_match("/[0-9]/", trim($_GET["lugar"]))
                    ) {
                        echo "<script> alert('Error: Algunos de los datos introducidos son incorrectos')</script>";
                    } else {

                        $id_citas = trim($_GET['id_citas']);
                        $fecha = trim($_GET["fecha"]);
                        $hora = trim($_GET["hora"]);

                        $motivo = trim($_GET["motivo"]);
                        $lugar = trim($_GET["lugar"]);
                        $id_cliente = trim($_GET["id_cliente"]);

                        $fechaactual = new DateTime();
                        $fechaactual->setTimezone(new DateTimeZone('UTC'));
                        $fechacita = new DateTime("$fecha $hora");
                        $intervalo = $fechaactual->diff($fechacita);
                        $horasDiferencia = $intervalo->h + ($intervalo->days * 24);

                        $limiteHoras = 24;

                        if (($fechacita > $fechaactual) && ($horasDiferencia > $limiteHoras)) {
                            echo "Puedes modificar o borrar la cita hasta 24 horas antes de su inicio.";
                            $consulta2 = "update citas set fecha= ?, hora = ?, motivo=?, lugar= ?, id_cliente= ? where id= ?";
                            $preparado = $con->prepare($consulta2);
                            $preparado->bind_param("sssssi", $fecha, $hora, $motivo, $lugar, $id_cliente, $id_citas);
                            $preparado->execute();
                            $preparado->close();
                            echo "<script> alert('Cita modificada correctamente') </script>";
                            header("location:./citas.php");
                        } else {
                            echo "<script> alert('</script>La cita no se puede modificar o borrar, ya que ha pasado el límite de 24 horas.</script>') ";
                        }
                    }
                }
            }
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
 pintarFooter(2);  ?>

</body>
</html>