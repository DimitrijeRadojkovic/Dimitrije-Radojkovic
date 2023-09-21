<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $niz = array("crvena", "plava", "zelena", "crna");
        $poslednji = array_pop($niz);
        echo implode(',', $niz) . "<br>";
        echo implode(',', $niz) . " i " . $poslednji;
    ?>
</body>
</html>