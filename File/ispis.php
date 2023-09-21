<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $myFileR = fopen("datoteka.txt", "r") or die("Greska");
        while(!feof($myFileR)){
            echo fgets($myFileR) . "<br>";
        }
        fclose($myFileR); 
    ?>
</body>
</html>