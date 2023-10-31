<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $coche[0] = "Opel";
    $coche[1] = "Corsa";
    $coche[2] = 2015;

    echo "<table>
            <tr> 
                <td>Marca</td>
                <td>Modelo</td>
                <td>Año</td>
            </tr>";
    echo "<tr>";

    foreach ($coche as $x) {
        echo "<td> $x </td>";
    }
    echo "</tr> </table>";




    ?>
</body>

</html>