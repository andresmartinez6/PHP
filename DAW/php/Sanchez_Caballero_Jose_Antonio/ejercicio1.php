<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="#" enctype="multipart/form-data">
        Suba una imagen para imprimir<br>
        Nombre de usuario <input type="text" name="nom"><br>
        Imagen <input type="file" name="foto"><br>
        <input type="submit" name="env1"><br>
    </form>
    <form method="post" action="#" enctype="multipart/form-data">
        Trabaje con nosotros<br>
        Nombre de usuario <input type="text" name="nom2"><br>
        Curriculum <input type="file" name="pdf"><br>
        <input type="submit" name="env2"><br>
    </form>

    <?php
    if (isset($_POST['env1'])) {
        $nom = $_POST['nom'];
        $org = $_FILES['foto']['name'];
        
        $temp = $_FILES['foto']['tmp_name'];
        if (!file_exists("./impresiones")) {
            mkdir("./impresiones");
        }
        $nfinal= "impresiones/$nom.png";
        move_uploaded_file($temp,"$nfinal");
        echo"<img src= '$nfinal'>";
    }
    elseif (isset($_POST['env2'])) {
        $nom2 = $_POST['nom2'];
        $org2 = $_FILES['pdf']['name'];
        $temp2 = $_FILES['pdf']['tmp_name'];
        if (!file_exists("./$nom2")) {
            mkdir("./$nom2");
    }
    $nfinal2= "$nom2/curriculum.pdf";
    move_uploaded_file($temp2,"$nfinal2");
    echo"Se ha subido correctamente";
}
    ?>
</body>
</html>