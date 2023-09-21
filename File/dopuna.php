<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $myFileA = fopen("datoteka.txt", "a") or die("Greska");
        $novi_text = "Novi film";
        fwrite($myFileA, $novi_text);
        fclose($myFileA);
    ?>
</body>
</html>