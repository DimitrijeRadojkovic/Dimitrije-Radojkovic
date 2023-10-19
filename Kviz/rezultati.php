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
    $poruka = "";
    foreach($_SESSION["arr"] as $key => $value){
        if($value == 1){
            $poruka = $poruka . $key . "<br>";
        }
    }
?>
    <p>Odgovorili ste tacno na <?php echo $_SESSION["br"] ?>/3 pitanja.</p>
    <p>Tacni odgovori su:<br>
        <?php echo $poruka; ?>
    </p>
</body>
</html>