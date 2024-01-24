<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $n=200;
    $b=30;

    if ($n<=$b){
        for ($i=$n; $i < $b; $i++) { 
            echo " $i ";
        }
    }else{
        for ($i=$b; $i < $n; $i++) { 
            echo " $i ";
        };
    };
    


    ?>
</body>

</html>