<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" id="forma1">
        Introduce nombre del primer vehículo:
        <br>
        <input type="text" name="nombre1" placeholder="Renault...">
        <br>
        Tipo:
        <br>
        Camión:<input type="radio" name="tipo1" value="C">
        Moto:<input type="radio" name="tipo1" value="M">
        Turismo<input type="radio" name="tipo1" value="T">
        <br>
        Peso en toneladas:
        <br>
        <input type="text" name="peso1" placeholder="1">
        <br>
        <br>
        Ahora del segundo vehículo:
        <br>
        <input type="text" name="nombre2" placeholder="Nissan...">
        <br>
        Tipo:
        <br>
        Camión:<input type="radio" name="tipo2" value="C">
        Moto:<input type="radio" name="tipo2" value="M">
        Turismo<input type="radio" name="tipo2" value="T">
        <br>
        Peso en toneladas:
        <br>
        <input type="text" name="peso2" placeholder="1">
        <br>
        <input type="submit" name="enviar" value="Aceptar">
    </form>
    <?php
        require_once 'vehiculo.php';//esto es el equivalente del IMPORT de Java para llamar a las clases
        if (isset($_POST['enviar'])) {
            $nom1=$_POST['nombre1'];
            $tipo1=$_POST['tipo1'];
            $peso1=$_POST['peso1'];
            $nom2=$_POST['nombre2'];
            $tipo2=$_POST['tipo2'];
            $peso2=$_POST['peso2'];

            $veh1=new Vehiculo($nom1,$tipo1,$peso1);
            $veh2=new Vehiculo($nom2,$tipo2,$peso2);
            if ($veh1->tipo==$veh2->tipo) {
                echo "<h2>Los vehículos tienen el mismo tipo</h2>";
                if ($veh1->peso>$veh2->peso) {
                    echo"Ganó el vehículo 1 de nombre $veh1->nombre y de peso $veh1->peso toneladas";
                }elseif($veh1->peso<$veh2->peso){
                    echo"Ganó el vehículo 2 de nombre $veh2->nombre con peso $veh2->peso toneladas";
                }else{
                    echo"Los vehículos tienen el mismo peso";
                }
            }else{
                echo "<h2>Los vehículos tienen distinto tipo, no se puede comparar</h2>";
            }
            
        }
    ?>
</body>
</html>