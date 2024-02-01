<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    nav{
        width: 100%;
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
    <nav class="bg-success">
        <a href="index.php" class="text-light">Pocetna</a>
        <?php
            include "konekcija.php";
            if(!isset($_SESSION["user"]))
                echo "<a href=registracija.php class='text-light'>Registracija</a>";
            else{
                echo "<a href=kreirajtemu.php class='text-light'>Kreiraj temu</a>";
                echo "<a href=odjava.php class='text-light'>Odjavi se</a>";
                echo "<a href=profil.php class='text-light'>Profil</a>";
            }
        ?>
    </nav>
    <?php
        if(isset($_SESSION["user"])){
            echo "Pozdrav " . $_SESSION["user"]["username"];
        }
        else
            echo "Niste prijavljeni";

            $sql = "SELECT * FROM teme";
            $res = $conn->query($sql);
            if($res -> num_rows > 0){
                while($row = $res -> fetch_assoc()){
                    $email_korisnika = $row["email_korisnika"];
                    $sql2 = "SELECT username FROM korisnici WHERE email = '$email_korisnika';";
                    $result = $conn->query($sql2);
                    echo "<div class='d-flex flex-column align-items-start m-3 bg-success rounded text-light'>";
                    echo "<h1>" . $row["naziv"] . "</h1>";
                    $username = $result -> fetch_assoc();
                    echo "<p style='font-size:15px'>" . $username["username"] . "<br>" . $row["vreme_unosa"] . "</p>";
                    echo "<p>" . $row["opis"] . "</p>";
                    echo "<button><a href=tema.php?id=" . $row["id"] . ">Otvori temu</a></button>";
                    echo "</div>";
                }
            }
    ?>
    
</body>
</html>