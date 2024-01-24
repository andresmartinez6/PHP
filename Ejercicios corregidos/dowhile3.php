<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $n=1;

    echo "<table> <tr>";

    do{
        echo " <td> $n </td>";
        if ($n%10==0){
            echo "</tr><tr>";
        }
        $n++;
        
    }while ($n<=100);
    echo "</tr></table>";

    ?>
</body>
</html>