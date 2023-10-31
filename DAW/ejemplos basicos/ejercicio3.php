<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $matriz['nombre']="Jorge";
    $matriz['apellido']="Perez";
    $matriz['edad']=35;
    $matriz['altura']=1.77;
    $matriz['peso']=80;
    $matriz['pelo']='Moreno';
    $matriz['estado']='Soltero';

    echo"<table border align='center'; width = '700px';>
    <tr>
    <td>0</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    </tr>
    <tr>
    <td>$matriz[nombre]</td>
    <td>$matriz[apellido]</td>
    <td>$matriz[edad]</td>
    <td>$matriz[altura]</td>
    <td>$matriz[peso]</td>
    <td>$matriz[pelo]</td>
    <td>$matriz[estado]</td>
    </tr>
    </table>"

    ?>
</body>
</html>