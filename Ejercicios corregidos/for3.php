<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    echo "<table> <tr>";
    for ($i = 1; $i <= 100; $i++) {
        echo " <td> $i </td> ";
        if ($i % 10 == 0) {
            echo "</tr><tr>";
        }
        ;
    };
    echo "</tr></table>";

    ?>
</body>

</html>