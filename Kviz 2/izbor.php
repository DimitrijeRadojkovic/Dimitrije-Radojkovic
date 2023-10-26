<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        var_dump($_SESSION["izbor"]);
        $h1 = "";
        $poruka = "";
        if(count($_SESSION["izbor"]) == 0){
            $h1 = "Niste nista izabrali!";
        }
        else{
            $h1 = "Izabrali ste:";
            foreach($_SESSION["izbor"] as $proizvod){
                $poruka .= $proizvod . "<br>";
            }
        } 
    ?>
    <h1><?php echo $h1; ?></h1>
    <p><?php echo $poruka; ?></p>
    <a href="index.php">Izaberi jos</a>
</body>
</html>