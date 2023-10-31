<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $cad1="libelula";
    $cad2="hormiga";
    $cad3="Rishhh";

    if ($cad1<=$cad3 and $cad1<=$cad2) {
        echo "$cad1";
        if($cad2<=$cad3){
            echo "<br> $cad2 <br> $cad3";
        }else{
            echo "$cad3 <br> $cad2";
        }
    }elseif ($cad2<=$cad3 && $cad2<=$cad1){
        echo "$cad2";
        if ($cad1<=$cad3){
            echo "<br> $cad1 <br> $cad3";
        }else{
            echo "<br> $cad3 <br> $cad1";
        }
    }else{
        echo "$cad3";
        if ($cad1<=$cad2){
            echo "<br> $cad1 <br> $cad2";
        }else{
            echo "<br> $cad2 <br> $cad1";
        }
    }
    ?>
</body>
</html>