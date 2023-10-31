<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $num1=2;
    $num2=200;
    if ($num1<$num2){
        while ($num1<$num2){
            echo " $num1 ";
            $num1++;
        }
    }else{
        while ($num2<$num1){
            echo " $num2 ";
            $num2++;
        }
    }
    ?>
</body>
</html>