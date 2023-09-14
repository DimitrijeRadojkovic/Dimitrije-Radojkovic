<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $myFile = fopen("datoteka.txt", "w") or die("Greska");
        $text = "neki tekst";
        fwrite($myFile, $text);
        fclose($myFile);
        
        $myFileR = fopen("datoteka.txt", "r") or die("Greska");
        echo "Tekst koji ste upisali: " . fread($myFileR, filesize("datoteka.txt"));
        fclose($myFileR);
    ?>
</body>
</html>