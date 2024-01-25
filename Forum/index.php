<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<style>
    nav{
        width: 100%;
        background-color: green;
        height: 40px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    a{
        padding: 10px;
    }
</style>
<body>
    <nav>
        <a href="index.php">Pocetna</a>
        <?php if(!isset($_SESSION["user"]))
                echo "<a href=registracija.php>Registracija</a>";
            else
                echo "<a href=odjava.php>Odjavi se</a>";
        ?>
    </nav>
    <?php
        if(isset($_SESSION["user"]))
            echo "Pozdrav " . $_SESSION["user"]["username"];
        else
            echo "Niste prijavljeni";
    ?>
    
</body>
</html>