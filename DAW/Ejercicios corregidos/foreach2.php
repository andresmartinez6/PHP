<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a[0] = 30;
    $a[1] = 23;
    $a[2] = 300;
    $aux = $a[0];
    foreach ($a as $x) {
        
        if ($x < $aux) {
            
            $aux = $x;
        }
    }   
    echo "$aux";
 
    ?>
</body>

</html>