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
        $izbor = array();
        $poruka = "";
        $sesija_izbor = "";
        if(isset($_SESSION["izbor"])){
            $izbor = array();
            foreach($_SESSION["izbor"] as $proizvod){
                array_push($izbor, $proizvod);
                $sesija_izbor .= $proizvod . "<br>";
            }
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            foreach($_POST["proizvodi"] as $proizvod){
                array_push($izbor, $proizvod);
            }
            $_SESSION["izbor"] = array_unique($izbor);
            var_dump($izbor);
            $poruka = "<a href=izbor.php>Izbor</a>";
        } 
    ?>
    <h1>Vec ste izabrali:</h1>
    <p><?php echo $sesija_izbor; ?></p>
    <h1>Izaberi proizvod</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <select name="proizvodi[]" multiple>
            <option value="Proizvod 1">Proizvod 1</option>
            <option value="Proizvod 2">Proizvod 2</option>
            <option value="Proizvod 3">Proizvod 3</option>
            <option value="Proizvod 4">Proizvod 4</option>
            <option value="Proizvod 5">Proizvod 5</option>
        </select><br>
        <input type="submit" value="Potvrdi">
    </form>
    <p><?php echo $poruka; ?></p>
</body>
</html>