<?php
if (isset($_POST["enviar"])) {

    require_once "funciones.php";
    $user = $_POST["usuario"];
    $contra = md5(md5($_POST["contra"]));
    $con = conectar();
    $consulta = "select id,nombre,apellidos,nombre_usuario from clientes where nombre_usuario=? and pass=?";
    $preparada = $con->prepare($consulta);
    $preparada->bind_param("ss", $user, $contra);
    $preparada->bind_result($id,$nombre,$apellidos,$usuario);
    $preparada->execute();
    $preparada->store_result();
    if ($preparada->num_rows > 0) {
        $preparada->fetch();
        session_start();
        $_SESSION["usuario"]=$usuario;
        $_SESSION["id"]=$id;
        $_SESSION["nombre"]=$nombre;
        $_SESSION["apellidos"]=$apellidos;
        $cookieSesion=session_encode();
         if (isset($_POST["recordar"]) && $_POST["recordar"]=="on"){
            $caducidad=time()+ 60*60*24*30; //30 días de caducidad
            setcookie("user",$cookieSesion, $caducidad, "/");
         }
    }else{
        echo "Credenciales incorrectas";
    }
    if (isset($_SESSION["usuario"]) && $_SESSION["id"]==0) {
        echo '<meta http-equiv="refresh" content="0;url=../index.php">';
    }elseif (isset($_SESSION["usuario"]) && $_SESSION["id"]>0){
        echo '<meta http-equiv="refresh" content="0;url=./misinmuebles.php">';
    }
}



?>