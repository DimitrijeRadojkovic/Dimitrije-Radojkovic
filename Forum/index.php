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
        <?php
            include "konekcija.php";
            if(!isset($_SESSION["user"]))
                echo "<a href=registracija.php>Registracija</a>";
            else{
                echo "<a href=kreirajtemu.php>Kreiraj temu</a>";
                echo "<a href=odjava.php>Odjavi se</a>";
            }
        ?>
    </nav>
    <?php
        if(isset($_SESSION["user"]))
            echo "Pozdrav " . $_SESSION["user"]["username"];
            $sql = "SELECT * FROM teme";
            $res = $conn->query($sql);
            if($res -> num_rows > 0){
                while($row = $res -> fetch_assoc()){
                    $email_korisnika = $row["email_korisnika"];
                    $sql2 = "SELECT username FROM korisnici WHERE email = '$email_korisnika';";
                    $result = $conn->query($sql2);
                    echo "<h1>" . $row["naziv"] . "</h1>";
                    $username = $result -> fetch_assoc();
                    echo "<p style='font-size:15px'>Od:" . $username["username"] . "<br>" . $row["vreme_unosa"] . "</p>";
                    echo "<p>" . $row["opis"] . "</p><br><br><br>";
                }
            }
        else
            echo "Niste prijavljeni";
    ?>
    
</body>
</html>