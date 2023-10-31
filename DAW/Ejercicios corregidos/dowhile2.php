<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n1=10;
    $n2=3;

    if ($n1<$n2){
        do{
            echo "  $n1  ";
            $n1++;
        }while ($n1<$n2);
    }else{
        do{
            echo " $n2 ";
            $n2++;
        }while ($n2<$n1);
    }

    ?>
</body>
</html>