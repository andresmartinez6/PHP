<?php require_once "./funciones.php"; comprobarCookies(); pintarHeader(2); 
if (accesoAdmin()){?>
<main>
    <?php
    $con = conectar();
    $consulta_id = "select AUTO_INCREMENT from information_schema.tables where table_schema = 'inmobiliaria' and table_name='noticias'";
    $id_noti = $con->query($consulta_id);
    if (!$id_noti) {
        echo "Sentencia mal escrita";
        echo "Error : $con->errno, que significa $con->error";
    } else {
        $datos_id = $id_noti->fetch_all(MYSQLI_ASSOC);
    }
    $id_noti->close();
    ?>
    <section id="noti">
        <h2>Introducir noticia</h2>
        <form action="#" method="POST" enctype='multipart/form-data'>
            <input type="text" READONLY name="id" hidden value=<?php echo $datos_id[0]['AUTO_INCREMENT'] ?>> <br>
            <input type="text" name="titular" placeholder="Titular de la noticia"><br>
            <input type="text" name="contenido" placeholder="Contenido de la noticia"><br>
            <input type="date" name="fecha"><br>
            <input type="file" name="foto"><br>
            <input type="submit" name="enviar">
        </form>

        <?php

        if (isset($_POST["enviar"])) {

            $sentencia3 = "insert into noticias values (null,?,?,?,?)";
            $preparada3 = $con->prepare($sentencia3);
            $titular = trim($_POST["titular"]);
            $contenido = trim($_POST["contenido"]);
            $fecha = $_POST["fecha"];
            if (!file_exists("../img")) {
                mkdir("../img");
            }
            if (!file_exists("../img/noticias/")) {
                mkdir("../img/noticias/");
            }
            $nombre_archivo = $_FILES["foto"]["name"];
            if ($_FILES["foto"]["type"] == "image/jpeg") {
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../img/noticias/$nombre_archivo");
            } elseif ($_FILES["foto"]["type"] == "image/png") {
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../img/noticias/$nombre_archivo");
            } elseif ($_FILES["foto"]["type"] == "image/gif") {
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../img/noticias/$nombre_archivo");
            } else {
                echo "<script> alert('El formato del archivo no es compatible con la aplicación')</script>";
            }
            $preparada3->bind_param("ssss", $titular, $contenido, $nombre_archivo, $fecha);
            $preparada3->execute();
            $preparada3->close();
            echo "<script> alert('Se ha añadido la noticia correctamente')</script>";
        }
        ?>
        <section id="buscar">
            <h2>Buscar noticia</h2>
            <form action="#buscar" method="GET">
                <input type="text" name="buscarnoticia">
                <input type="submit" name="enviarnoticia">
            </form>
            <?php
            if (isset($_GET["enviarnoticia"])) {
                if ($_GET["buscarnoticia"] != "") {
                    $noticia = "%" . $_GET["buscarnoticia"] . "%";
                    $consulta4 = "select * from noticias where titular like ?";
                    $preparada4 = $con->prepare($consulta4);
                    $preparada4->bind_param("s", $noticia);
                    $preparada4->bind_result($id, $titular, $contenido, $imagen, $fecha);
                    $preparada4->execute();
                    if (!$preparada4) {
                        echo "error $preparada4->errorno: tiene un error $preparada4->error";
                    } else {
                        echo "<table border>";
                        while ($preparada4->fetch()) {
                            echo "<tr><th>$id</th><td>$titular</td><td>$contenido</td><td>Dirección</td><td>$imagen</td> <td>$fecha</td><td><a href='./noticias.php?id=$id'>Eliminar noticia</td></tr>";
                        }

                    }
                    echo "</table>";

                    $preparada4->close();
                }
            }
            if (isset($_GET["id"])) {
                $borrar = "delete from noticias where id=?";
                $preparadaborrar = $con->prepare($borrar);
                $preparadaborrar->bind_param("i", $_GET["id"]);
                $preparadaborrar->execute();
                echo "<script> alert('Se ha eliminado la noticia con id=$_GET[id] correctamente')</script>";
                $preparadaborrar->close();
            }
            ?>
        </section>

        <section id="listadonoti">
            <h2>Lista de noticias</h2>
            <?php
            if (isset($_GET['pag'])){
                $pagina = $_GET['pag'];
                $mostrar=$pagina*4;
            }else{
                $mostrar=0;
                $pagina = 0;
            }
            if ($pagina == 0) {
                $pag_siguiente = 1;
                $pag_anterior = 0;
            } else {
                $pag_siguiente = $pagina + 1;
                $pag_anterior = $pagina - 1;
            }
            $sentencianoti = "select * from noticias order by fecha limit $mostrar,4";
            
            $preparadanoti = $con->query($sentencianoti);
            echo "<table border><tr><th>Imagen</th><th>ID</th><th>Titular</th><th>Contenido</th><th>Fecha</th><th></th></tr>";
            while ($filas = $preparadanoti->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr><td><a href='./php/noticiacompleta.php?id_noti=$filas[id]'>'<img src='../img/noticias/$filas[imagen]'></a></td><td>$filas[id]</td><td>$filas[titular]</td><td>$filas[contenido]</td><td>$filas[fecha]</td><td><a href='./noticias.php?id=$filas[id] '>Eliminar noticia</td></tr>";
            }
            echo "</table>";
            $preparadanoti->close();
            $con->close();
            ?>

            <div>
                <?php
                echo "<a href='noticias.php?pag=$pag_anterior'>←</a>";
                echo "<a href='noticias.php?pag=$pag_siguiente'>→</a>";
                ?>

            </div>
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